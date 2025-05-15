<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
@yield('title')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="/favicon.ico" type="image/x-icon"/>
<script src="{{ mix('js/app.js') }}" defer></script>
<link href="{{ mix('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('fontawesome/css/fontawesome.css') }}" rel="stylesheet">
<link href="{{ asset('fontawesome/css/brands.css') }}" rel="stylesheet">
<link href="{{ asset('fontawesome/css/solid.css') }}" rel="stylesheet">
</head>
<body>

<div id="app">
    <div class="py-4">
        @yield('content')
    </div>
</div>

</body>
</html>
