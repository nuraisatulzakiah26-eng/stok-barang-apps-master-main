<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSS - Material Furniture</title>

  <link rel="stylesheet" href="{{ asset('dashui/assets/css/theme.css') }}">
    
</head>

<body class="bg-light vh-100 d-flex flex-column justify-content-center">
    <div class="container text-center">
        <div class="row justify-content-center">
           <div class="mb-4">
    <img src="{{ asset('dashui/assets/images/brand/logo-furniture.png') }}" 
         alt="Logo Inventra" 
         class="img-fluid" 
         style="max-height: 100px;">
                
                <div class="d-flex justify-content-center gap-3">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg shadow-sm px-5">Buka Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg shadow-sm px-5">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg px-5">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html