<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyekController extends Controller
{
    public function index()
    {
        $proyeks = Proyek::with(['mahasiswa', 'dosen'])->paginate(10);
        return view('proyek.index', compact('proyeks'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        return view('proyek.create', compact('mahasiswas', 'dosens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:3',
            'deskripsi' => 'required',
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'dosen_id' => 'required|exists:dosens,id',
            'dokumen' => 'nullable|mimes:pdf,docx|max:2048',
            'status' => 'required'
        ]);

        $data = $request->all();

        if ($request->hasFile('dokumen')) {
            $data['dokumen'] = $request->file('dokumen')->store('dokumen_proyek', 'public');
        }

        Proyek::create($data);

        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function edit(Proyek $proyek)
    {
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        return view('proyek.edit', compact('proyek', 'mahasiswas', 'dosens'));
    }

    public function update(Request $request, Proyek $proyek)
    {
        $request->validate([
            'judul' => 'required|min:3',
            'deskripsi' => 'required',
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'dosen_id' => 'required|exists:dosens,id',
            'dokumen' => 'nullable|mimes:pdf,docx|max:2048',
            'status' => 'required'
        ]);

        $data = $request->all();

        if ($request->hasFile('dokumen')) {
            if ($proyek->dokumen && Storage::disk('public')->exists($proyek->dokumen)) {
                Storage::disk('public')->delete($proyek->dokumen);
            }
            $data['dokumen'] = $request->file('dokumen')->store('dokumen_proyek', 'public');
        }

        $proyek->update($data);

        return redirect()->route('proyek.index')->with('success', 'Data proyek berhasil diperbarui.');
    }

    public function destroy(Proyek $proyek)
    {
        if ($proyek->dokumen && Storage::disk('public')->exists($proyek->dokumen)) {
            Storage::disk('public')->delete($proyek->dokumen);
        }

        $proyek->delete();

        return redirect()->route('proyek.index')->with('success', 'Data proyek berhasil dihapus.');
    }
}
