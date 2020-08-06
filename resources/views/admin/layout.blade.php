<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Google Fonts and Icons  --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,700;0,800;1,400&family=Roboto:wght@300;500;700;900&display=swap" rel="stylesheet">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Custom Style / My Css  --}}
    <link rel="stylesheet" href=" {{asset('css/app.css')}} ">

    <title>Dj Market | Admin</title>
</head>
<body>

    @include('admin.includes.top-nav')

    <div class="container-wide">
        <div class="admin-sidebar">

            <ul class="list-group">
                <li class="list-group-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="list-group-item"><a href="{{route('products.index')}}">Products</a></li>
                <li class="list-group-item"><a href="{{route('categories.index')}}">Categories</a></li>
                <li class="list-group-item"><a href="{{route('orders.index')}}">Orders</a></li>
                <li class="list-group-item"><a href="{{route('users.index')}}">Users</a></li>
            </ul>
        </div>
        <div class="admin-content">
            
            @include('admin.includes.messages')

            @yield('js-code')

            @yield('content')
            
        </div>
    </div>
    
</body>
</html>