@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card text-center p-5" style="max-width: 600px; background: linear-gradient(135deg, #f8fbff, #eef5ff);">
        <div class="mb-3">
            <span style="font-size: 40px;">🎓</span>
        </div>
        <h3 class="fw-bold text-primary">Selamat Datang, {{ Auth::user()->name }}!</h3>
        <p class="mt-2 text-secondary">
            Anda login sebagai Admin
            <strong class="{{ Auth::user()->role == 'admin' ? 'text-danger' : 'text-success' }}">
                {{ ucfirst(Auth::user()->role) }}
            </strong>.
        </p>

        @if(Auth::user()->role == 'admin')
            <p>Kelola data kampus melalui menu berikut:</p>
            <div class="d-flex flex-wrap justify-content-center gap-3 mt-3">
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary px-4 py-2">
                    👩‍🎓 Data Mahasiswa
                </a>
                <a href="{{ route('dosen.index') }}" class="btn btn-success px-4 py-2">
                    👨‍🏫 Data Dosen
                </a>
                <a href="{{ route('proyek.index') }}" class="btn btn-warning px-4 py-2">
                    📘 Data Proyek
                </a>
            </div>
        @else
            <p class="mt-3">Anda hanya dapat melihat informasi umum.</p>
            <a href="#" class="btn btn-outline-primary mt-3">
                🔍 Lihat Informasi
            </a>
        @endif
    </div>
</div>
@endsection