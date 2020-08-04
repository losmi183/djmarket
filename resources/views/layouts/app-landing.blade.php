<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Google Fonts and Icons  --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,700;0,800;1,400&family=Roboto:wght@300;500;700;900&display=swap" rel="stylesheet">

    {{-- Google AdSence  --}}
    <script data-ad-client="ca-pub-2402254232352226" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    {{-- Custom Style / My Css  --}}
    <link rel="stylesheet" href=" {{asset('css/app.css')}} ">

    <title>Dj Market | @yield('title')</title>
</head>
<body>

    @include('includes.header-hero')

    @yield('content')

    @include('includes.footer')

</body>
</html>