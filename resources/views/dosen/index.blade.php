@extends('layouts.app')
@section('title', 'Data Dosen')
@section('content')

<div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold text-primary">👩‍🏫 Daftar Dosen</h4>
        <a href="{{ route('dosen.create') }}" class="btn btn-success shadow-sm">+ Tambah Dosen</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
        <thead class="table-primary text-center">
            <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Email</th>
            <th>Bidang Keahlian</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @forelse ($dosens as $index => $dsn)
            <tr>
            <td>{{ $dosens->firstItem() + $index }}</td>
            <td>{{ $dsn->nama }}</td>
            <td>{{ $dsn->nip }}</td>
            <td>{{ $dsn->email }}</td>
            <td>{{ $dsn->bidang_keahlian }}</td>
            <td>
                <a href="{{ route('dosen.edit', $dsn->id) }}" class="btn btn-sm btn-warning shadow-sm">Edit</a>
                <form action="{{ route('dosen.destroy', $dsn->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger shadow-sm">Hapus</button>
                </form>
            </td>
            </tr>
            @empty
            <tr>
            <td colspan="6" class="text-center text-muted py-3">Belum ada data dosen.</td>
            </tr>
            @endforelse
        </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $dosens->links() }}
    </div>
</div>
@endsection
