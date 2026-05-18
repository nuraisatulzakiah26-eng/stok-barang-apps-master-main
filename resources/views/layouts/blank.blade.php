<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventra | @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('dashui/assets/css/theme.css') }}">
</head>
<body class="bg-light">

    @yield('content')

    <script src="{{ asset('dashui/assets/js/theme.min.js') }}"></script>
</body>
</html>