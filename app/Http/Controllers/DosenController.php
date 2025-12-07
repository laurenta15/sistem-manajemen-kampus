<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::paginate(10);
        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'nip' => 'required|unique:dosens',
            'email' => 'required|email|unique:dosens',
            'bidang_keahlian' => 'required'
        ]);

        Dosen::create($request->all());

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'nip' => 'required|unique:dosens,nip,' . $dosen->id,
            'email' => 'required|email|unique:dosens,email,' . $dosen->id,
            'bidang_keahlian' => 'required'
        ]);

        $dosen->update($request->all());

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus.');
    }
}
