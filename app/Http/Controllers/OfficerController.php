<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $officers = Officer::all();
        return view('officers.index', compact('officers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('officers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:officers,email',
            'password' => 'required|string',
            'phone' => 'required|string|max:20',
        ]);

        Officer::create($request->all());
        return redirect()->route('officers.index')
                        ->with('success', 'Officer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Officer $officer)
    {
        $officer = Officer::find($officer->id);
        return view('officers.show', compact('officer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Officer $officer)
    {
        return view('officers.edit', compact('officer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Officer $officer)
    {
        $officer->update($request->all());
        return redirect()->route('officers.index')
                        ->with('success', 'Officer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Officer $officer)
    {
        $officer->delete();
        return redirect()->route('officers.index')
                        ->with('success', 'Officer deleted successfully.');
    }
}
