<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        $departements = Departement::all();
        return view('departements.index', compact('departements'));
    }

    public function create()
    {
        return view('departements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        Departement::create($request->all());

        return redirect()->route('departements.index')->with('success', 'Departemen berhasil ditambahkan');
    }

    public function show(Departement $departement)
    {
        //
    }

    public function edit(Departement $departement)
    {
        return view('departements.edit', compact('departement'));
    }

    public function update(Request $request, Departement $departement)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $departement->update($request->all());

        return redirect()->route('departements.index')->with('success', 'Departemen berhasil diperbarui');
    }

    public function destroy(Departement $departement)
    {
        $departement->delete();

        return redirect()->route('departements.index')->with('success', 'Departemen berhasil dihapus');
    }
}
