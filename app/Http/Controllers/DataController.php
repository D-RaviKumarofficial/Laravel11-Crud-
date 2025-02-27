<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    // Display a listing of Datas
    public function index()
    {
        $Datas = Data::all(); // Fetch all Datas
        return view('index', compact('Datas'));
    }

    // Show the form for creating a new Data
    public function create()
    {
        return view('create');
    }

    // Store a newly created Data in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:data,email', // Corrected table name
            'dob' => 'required|date',
            'year' => 'required|integer',
        ]);

        Data::create($request->all()); // Store Data in the database

        return redirect()->route('index')->with('success', 'Data created successfully.');
    }

    // Show a specific Data
    public function show(Data $Data)
    {
        return view('show', compact('Data'));
    }

    // Show the form for editing a Data
    public function edit(Data $Data)
    {
        return view('edit', compact('Data'));
    }

    // Update the Data information in the database
    public function update(Request $request, Data $Data)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:data,email,' . $Data->id, // Corrected table name
            'dob' => 'required|date',
            'year' => 'required|integer',
        ]);

        $Data->update($request->all()); // Update Data in the database

        return redirect()->route('index')->with('success', 'Data updated successfully.');
    }

    // Delete a Data from the database
    public function destroy(Data $Data)
    {
        $Data->delete(); // Delete Data from the database
        return redirect()->route('index')->with('success', 'Data deleted successfully.');
    }
}
