@extends('layouts.app')
@section('content')

<h3>Edit Mahasiswa</h3><hr>

<form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}">
    </div>

    <div class="mb-3">
        <label>NIM</label>
        <input type="text" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $mahasiswa->email) }}">
    </div>

    <div class="mb-3">
        <label>Jurusan</label>
        <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan', $mahasiswa->jurusan) }}">
    </div>

    <div class="mb-3">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">
        @if ($mahasiswa->foto)
        <img src="{{ asset('storage/'.$mahasiswa->foto) }}" width="100" class="mt-2 rounded">
        @endif
    </div>

    <button type="submit" class="btn btn-success">Perbarui</button>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection