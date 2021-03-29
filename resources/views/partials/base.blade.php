<!DOCTYPE html>
<html lang="en">
<head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
