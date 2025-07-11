<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
    @if(Session::has('success'))
        <div class="fixed top-4 right-4 rounded-lg shadow-md bg-blue-600 text-white px-5 py-3" id="message">
            <p>{{session('success')}}</p>
        </div>
        <script>
            setTimeout(() => {
                document.getElementById('message').style.display = 'none';
            }, 2000);
        </script>
@endif
        <div class="flex">
            <div class="w-56 h-screen bg-gray-100 shadow">
                <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fstock.adobe.com%2Fsearch%3Fk%3D%2522rk%2Blogo%2522&psig=AOvVaw3QpbuqZvjJ3jioiKh2FaK3&ust=1717926671343000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCMiyrdrdy4YDFQAAAAAdAAAAABAE" alt="" class="p-2 m-2 w-10/12 mx-auto mt-5 bg-white rounded-lg shadow-lg ">
                <div class="mt-5">
                    <a href="{{route('dashboard')}}" class="text-xl block pl-4 p-2 m-2 border-b border-amber-600 hover:bg-amber-600 hover:text-white">Dashboard</a>
                    <a href="{{route('categories.index')}}" class="text-xl block pl-4 p-2 m-2 border-b border-amber-600 hover:bg-amber-600 hover:text-white">Categories</a>
                    <a href="{{route('rooms.index')}}" class="text-xl block pl-4 p-2 m-2 border-b border-amber-600 hover:bg-amber-600 hover:text-white">Rooms</a>
                    <a href="{{route('useradmin.index')}}" class="text-xl block pl-4 p-2 m-2 border-b border-amber-600 hover:bg-amber-600 hover:text-white">Users</a>
                    <a href="{{route('notification')}}" class="text-xl block pl-4 p-2 m-2 border-b border-amber-600 hover:bg-amber-600 hover:text-white">Notification</a>
                   <form id="logout-form" method="post" action="{{route('logout')}}">
                    @csrf
                   <a onclick="event.preventDefault(); document.getElementById('logout-form').submit() "class="text-xl block pl-4 p-2 m-2 border-b border-amber-600 hover:bg-amber-600 hover:text-white  ">Logout</a>

                    </form>
                   
                </div>
            </div>
            <div class="p-4 flex-1">
                
                @yield('content')

            </div>
        </div>
    </body>
</html>
