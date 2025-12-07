<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::paginate(10);
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'nim' => 'required|unique:mahasiswas',
            'email' => 'required|email|unique:mahasiswas',
            'jurusan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:1024'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_mahasiswa', 'public');
        }

        Mahasiswa::create($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
            'jurusan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:1024'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($mahasiswa->foto && Storage::disk('public')->exists($mahasiswa->foto)) {
                Storage::disk('public')->delete($mahasiswa->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto_mahasiswa', 'public');
        }

        $mahasiswa->update($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        if ($mahasiswa->foto && Storage::disk('public')->exists($mahasiswa->foto)) {
            Storage::disk('public')->delete($mahasiswa->foto);
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
