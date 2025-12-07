<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Manajemen Kampus')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
        background-color: #f4f6fc;
        font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
        background: linear-gradient(90deg, #0056b3, #007bff);
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .navbar-brand {
        font-weight: bold;
        }
        .nav-link {
        color: #f8f9fa !important;
        transition: 0.3s;
        }
        .nav-link:hover {
        color: #ffe082 !important;
        }
        .card {
        border: none;
        border-radius: 14px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.06);
        transition: transform 0.2s;
        }
        .card:hover {
        transform: translateY(-4px);
        }
        footer {
        text-align: center;
        color: #6c757d;
        margin-top: 60px;
        padding: 15px;
        font-size: 14px;
        }
    </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">🎓 Manajemen Kampus</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
            @auth
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <li class="nav-item"><a href="{{ route('admin.mahasiswa.index') }}" class="nav-link">Mahasiswa</a></li>
                    <li class="nav-item"><a href="{{ route('admin.dosen.index') }}" class="nav-link">Dosen</a></li>
                    <li class="nav-item"><a href="{{ route('admin.proyek.index') }}" class="nav-link">Proyek</a></li>
                @endif

                <li class="nav-item ms-3 text-light">
                Halo, <strong>{{ Auth::user()->name }}</strong> 👋
                </li>
                <li class="nav-item ms-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-light btn-sm">Logout</button>
                </form>
                </li>
            @endauth
            </ul>
        </div>
        </div>
    </nav>

    <main class="container py-5">
        @if (session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} Manajemen Kampus | by Laurenta Dini Aprinda
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
