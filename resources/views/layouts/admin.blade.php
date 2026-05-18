<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventra | @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('dashui/assets/css/theme.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.1/feather.min.css">

    <style>
        /* Tambahan sentuhan profesional */
        body { font-family: 'Inter', sans-serif; background-color: #f5f7fb; }
        .navbar-brand { font-weight: 700; color: #624bff !important; }
    </style>
</head>

<body>
    <div id="db-wrapper">
        <div id="page-content">
            <nav class="navbar navbar-expand-lg navbar-white bg-white px-4 py-3 border-bottom">
                <a class="navbar-brand" href="#">INVENTRA</a>
                <div class="ms-auto">
                    <span class="text-muted me-2">Halo, Admin</span>
                </div>
            </nav>

            <div class="container-fluid p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('dashui/assets/js/theme.min.js') }}"></script>
</body>
</html>