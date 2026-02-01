<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Student;
use App\Models\Item;
use App\Models\Officer;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = Borrow::with(['student','item','officer'])->latest()->get();
        return view('borrows.index', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('borrows.create', [
            'students' => Student::all(),
            'items' => Item::where('stock', '>', 0)->get(),
            'officers' => Officer::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'item_id' => 'required|exists:items,id',
            'officer_id' => 'required|exists:officers,id',
            'borrow_date' => 'required|date',
            'pick_up_time' => 'required|date_format:H:i',
            'condition' => 'required|string',
        ]);

        $item = Item::findOrFail($request->item_id);

        if ($item->stock < 1) {
            return redirect()->back()->withErrors(['item_id' => 'stock barang tidak tersedia'])->withInput();
        }

        Borrow::create($request->all());

        $item->decrement('stock');

        return redirect()->route('borrows.index')
                        ->with('success', 'Peminjaman berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrow $borrow)
    {
        $borrow->load(['student','item','officer', 'return']);
        return view('borrows.show', compact('borrow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrow $borrow)
    {
        return view ('borrows.edit', [
            'borrow' => $borrow,
            'students' => Student::all(),
            'items' => Item::all(),
            'officers' => Officer::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrow $borrow)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'item_id' => 'required|exists:items,id',
            'officer_id' => 'required|exists:officers,id',
            'borrow_date' => 'required|date',
            'pick_up_time' => 'required|date_format:H:i',
            'condition' => 'required|string',
        ]);

        if ($borrow->item_id != $request->item_id) {
            $borrow->item_id->increment('stock');

            $newItem = Item::findOrFail($request->item_id);
            if ($newItem->stock < 1) {
                return back()->with('error','Stok barang baru habis');
            }
            $newItem->decrement('stock');
        }

        $borrow->update($request->all());

        return redirect()->route('borrows.index')
            ->with('success','Data peminjaman berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrow $borrow)
    {
        if (!$borrow->return) {
            $borrow->item->increment('stock');
        }

        $borrow->delete();

        return redirect()->route('borrows.index')
            ->with('success','Data peminjaman berhasil dihapus');
    }
}
