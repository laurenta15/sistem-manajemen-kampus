@extends('layouts.app')
@section('title', 'Data Proyek')
@section('content')

<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold text-primary">📁 Daftar Proyek Mahasiswa</h4>
        <a href="{{ route('proyek.create') }}" class="btn btn-success shadow-sm">+ Tambah Proyek</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
        <thead class="table-primary">
            <tr>
            <th>No</th><th>Judul</th><th>Mahasiswa</th><th>Dosen</th><th>Status</th><th>Dokumen</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($proyeks as $index => $p)
        <tr>
            <td>{{ $proyeks->firstItem() + $index }}</td>
            <td>{{ $p->judul }}</td>
            <td>{{ $p->mahasiswa->nama }}</td>
            <td>{{ $p->dosen->nama }}</td>
            <td>
                <span class="badge bg-{{ $p->status == 'Disetujui' ? 'success' : ($p->status == 'Ditolak' ? 'danger' : 'secondary') }}">
                {{ $p->status }}
                </span>
            </td>
            <td>
                @if ($p->dokumen)
                <a href="{{ asset('storage/'.$p->dokumen) }}" class="btn btn-sm btn-info">Lihat</a>
                @else
                <span class="text-muted">-</span>
                @endif
            </td>
            <td>
                <a href="{{ route('proyek.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('proyek.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center text-muted">Belum ada proyek</td></tr>
            @endforelse
        </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $proyeks->links() }}
    </div>
</div>
@endsection