@extends('layouts.app')
@section('content')

<h3>Edit Proyek</h3><hr>

<form action="{{ route('proyek.update', $proyek->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Judul Proyek</label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul', $proyek->judul) }}">
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $proyek->deskripsi) }}</textarea>
    </div>

    <div class="mb-3">
        <label>Mahasiswa</label>
        <select name="mahasiswa_id" class="form-select">
        @foreach ($mahasiswas as $mhs)
            <option value="{{ $mhs->id }}" {{ old('mahasiswa_id', $proyek->mahasiswa_id) == $mhs->id ? 'selected' : '' }}>{{ $mhs->nama }}</option>
        @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Dosen Pembimbing</label>
        <select name="dosen_id" class="form-select">
        @foreach ($dosens as $dsn)
            <option value="{{ $dsn->id }}" {{ old('dosen_id', $proyek->dosen_id) == $dsn->id ? 'selected' : '' }}>{{ $dsn->nama }}</option>
        @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Dokumen</label>
        <input type="file" name="dokumen" class="form-control">
        @if ($proyek->dokumen)
        <a href="{{ asset('storage/'.$proyek->dokumen) }}" target="_blank" class="btn btn-sm btn-info mt-2">Lihat Dokumen Lama</a>
        @endif
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-select">
        <option value="Menunggu" {{ $proyek->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
        <option value="Disetujui" {{ $proyek->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
        <option value="Ditolak" {{ $proyek->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Perbarui</button>
    <a href="{{ route('proyek.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection