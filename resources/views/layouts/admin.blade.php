<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PT Pelangi Kreasi Solusi | @yield('title', 'Sistem Material')</title>

    <link rel="stylesheet" href="{{ asset('dashui/assets/css/theme.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.1/feather.min.css">

    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f5f7fb; }
        .navbar-brand { font-weight: 700; color: #624bff !important; }
    </style>
</head>

<body>
    <div id="db-wrapper">
        @include('layouts.sidebar')
        
        <div id="page-content">
            <nav class="navbar navbar-expand-lg navbar-white bg-white px-4 py-2 border-bottom shadow-sm">
                <div class="container-fluid">
                    <span class="navbar-brand fw-bold text-primary mb-0 h1 fs-4">PKSD-Inventory</span>
                    
                    <div class="ms-auto d-flex align-items-center">
                        <ul class="navbar-nav mb-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center text-gray-800" href="#" id="navbarDropdownProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="text-end me-3 d-none d-sm-block">
                                        <h6 class="mb-0 fw-bold text-dark">{{ Auth::user()->name }}</h6>
                                        <small class="text-muted fw-semi-bold">{{ ucfirst(Auth::user()->role) }}</small>
                                    </div>
                                    <div class="avatar avatar-md avatar-indicators avatar-online">
                                        <img alt="avatar" src="{{ asset('dashui/assets/images/avatar/avatar-21.jpg') }}" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                                    </div>
                                </a>
                                
                                <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="navbarDropdownProfile" style="min-width: 200px;">
                                    <img alt="avatar" src="{{ asset('dashui/assets/images/avatar/avatar-21.jpg') }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                                    <li class="dropdown-header border-bottom pb-2 mb-2">
                                        <h6 class="mb-0 fw-bold text-dark">{{ Auth::user()->name }}</h6>
                                        <small class="text-muted">{{ Auth::user()->email }}</small>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger fw-bold d-flex align-items-center border-0 bg-transparent w-100 py-2">
                                                <span class="me-2">Keluar Aplikasi</span> 
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dashui/assets/js/theme.min.js') }}"></script>
</body>
</html>