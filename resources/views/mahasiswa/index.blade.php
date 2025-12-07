@extends('layouts.app')
@section('title', 'Data Mahasiswa')
@section('content')

<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold text-primary">📚 Daftar Mahasiswa</h4>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-success shadow-sm">+ Tambah Mahasiswa</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
        <thead class="table-primary">
            <tr>
            <th>No</th><th>Foto</th><th>Nama</th><th>NIM</th><th>Email</th><th>Jurusan</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswas as $index => $mhs)
            <tr>
            <td>{{ $mahasiswas->firstItem() + $index }}</td>
            <td>
                @if ($mhs->foto)
                <img src="{{ asset('storage/'.$mhs->foto) }}" width="50" class="rounded-circle shadow-sm">
                @else
                <span class="text-muted">-</span>
                @endif
            </td>
            <td>{{ $mhs->nama }}</td>
            <td>{{ $mhs->nim }}</td>
            <td>{{ $mhs->email }}</td>
            <td>{{ $mhs->jurusan }}</td>
            <td>
                <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center text-muted">Belum ada data mahasiswa</td></tr>
            @endforelse
        </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $mahasiswas->links() }}
    </div>
</div>
@endsection