<?php

namespace App\Http\Controllers\admin;

use App\Models\Returns;
use App\Models\Borrow;
use App\Models\Officer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReturnsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $returns = Returns::with(['borrow.student','borrow.item','officer'])
                    ->latest()->get();
        return view('returns.index', compact('returns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('returns.create', [
            'borrows' => Borrow::doesntHave('return')->get(),
            'officers' => Officer::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'borrow_id'     => 'required|exists:borrows,id',
            'officer_id'    => 'required',
            'return_date'   => 'required|date',
            'drop_off_time' => 'required',
            'condition'       => 'required|string'
        ]);

        $return = Returns::create($request->all());

        // tambah stok barang
        $borrow = Borrow::findOrFail($request->borrow_id);
        $borrow->item->increment('stock');

        return redirect()->route('returns.index')
            ->with('success','Pengembalian berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Returns $returns)
    {
        $returns->load(['borrow.student','borrow.item','officer']);
        return view('returns.show', compact('returns'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Returns $returns)
    {
        return view('returns.edit', [
            'return'  => $returns,
            'officers' => Officer::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Returns $returns)
    {
        $request->validate([
            'officer_id'    => 'required',
            'return_date'   => 'required|date',
            'drop_off_time' => 'required',
            'condition'     => 'required|string'
        ]);

        $returns->update($request->all());

        return redirect()->route('returns.index')
            ->with('success','Data pengembalian berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Returns $returns)
    {
        $returns->borrow->item->decrement('stock');

        $returns->delete();

        return redirect()->route('returns.index')
            ->with('success','Data pengembalian berhasil dihapus');
    }
}
