@extends('layouts.app')
@section('content')

<h3>Edit Dosen</h3><hr>

<form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $dosen->nama) }}">
    </div>

    <div class="mb-3">
        <label>NIP</label>
        <input type="text" name="nip" class="form-control" value="{{ old('nip', $dosen->nip) }}">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $dosen->email) }}">
    </div>

    <div class="mb-3">
        <label>Bidang Keahlian</label>
        <input type="text" name="bidang_keahlian" class="form-control" value="{{ old('bidang_keahlian', $dosen->bidang_keahlian) }}">
    </div>

    <button type="submit" class="btn btn-success">Perbarui</button>
    <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
