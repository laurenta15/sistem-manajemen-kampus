@extends('layouts.app')
@section('content')

<h3>Tambah Proyek</h3><hr>

<form action="{{ route('proyek.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Judul Proyek</label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
        @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>
        @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Mahasiswa</label>
        <select name="mahasiswa_id" class="form-select">
        <option value="">-- Pilih Mahasiswa --</option>
        @foreach ($mahasiswas as $mhs)
            <option value="{{ $mhs->id }}" {{ old('mahasiswa_id') == $mhs->id ? 'selected' : '' }}>{{ $mhs->nama }}</option>
        @endforeach
        </select>
        @error('mahasiswa_id') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Dosen Pembimbing</label>
        <select name="dosen_id" class="form-select">
        <option value="">-- Pilih Dosen --</option>
        @foreach ($dosens as $dsn)
            <option value="{{ $dsn->id }}" {{ old('dosen_id') == $dsn->id ? 'selected' : '' }}>{{ $dsn->nama }}</option>
        @endforeach
        </select>
        @error('dosen_id') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Dokumen (PDF/DOCX, maks 2MB)</label>
        <input type="file" name="dokumen" class="form-control">
        @error('dokumen') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-select">
        <option value="Menunggu">Menunggu</option>
        <option value="Disetujui">Disetujui</option>
        <option value="Ditolak">Ditolak</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('proyek.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection