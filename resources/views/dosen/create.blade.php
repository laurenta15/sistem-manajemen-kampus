@extends('layouts.app')
@section('title', 'Tambah Dosen')
@section('content')

<div class="card p-4 shadow-sm">
    <h4 class="fw-bold text-primary mb-3">📝 Tambah Dosen Baru</h4>

    <form action="{{ route('dosen.store') }}" method="POST">
        @csrf

        <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
        @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
        <label for="nip" class="form-label">NIP</label>
        <input type="text" name="nip" id="nip" class="form-control" value="{{ old('nip') }}" required>
        @error('nip') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
        <label for="bidang_keahlian" class="form-label">Bidang Keahlian</label>
        <input type="text" name="bidang_keahlian" id="bidang_keahlian" class="form-control" value="{{ old('bidang_keahlian') }}" required>
        @error('bidang_keahlian') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
@endsection