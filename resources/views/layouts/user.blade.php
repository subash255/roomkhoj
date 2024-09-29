<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roomkhoj.com</title>
    <!-- Link to CSS -->
    <link rel="stylesheet" >
    <!-- Boxicons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">

    <!-- Box Icons -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gray-100 text-gray-900">
    <!-- Navbar -->
    <header class="bg-cyan-500 shadow-lg">
        <div class="container mx-auto flex items-center justify-between py-2">
            <a href="{{route('users.index')}}" class="flex flex-col items-center">
                <img src="{{asset('img/logo.png')}}" alt="RoomKhoj Logo" class="h-14 w-14 rounded-full border-2 border-white shadow-lg"> <!-- Smaller logo size -->
                <span class="mt-1 text-lg font-bold text-white">RoomKhoj</span> <!-- Logo text adjusted -->
            </a>
            <nav>
                <ul class="flex gap-8">
                    <li><a href="{{route('users.index')}}" class="text-white font-semibold text-lg hover:text-gray-200 transition duration-300">Home</a></li> <!-- Increased text size -->
                    <li><a href="{{route('users.about')}}" class="text-white font-semibold text-lg hover:text-gray-200 transition duration-300">About Us</a></li>
                    <li><a href="#sales" class="text-white font-semibold text-lg hover:text-gray-200 transition duration-300">Rents</a></li>
                    <li><a href="#properties" class="text-white font-semibold text-lg hover:text-gray-200 transition duration-300">Rooms</a></li>
                </ul>
            </nav>





            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <div class="relative inline-block text-left">
                <!-- Dropdown trigger image -->
                <img id="dropdownDefaultButton" src="{{asset('image/users/'.$user->photopath)}}" alt="Dropdown trigger" class="cursor-pointer w-10 h-10 rounded-full mr-8">

                <!-- Dropdown menu -->
                <div id="dropdown" class="absolute left-0 mt-2 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="{{ route('users.profile',['id' => $user->id])}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                        </li>
                        <li>
                            <a href="{{route('users.room')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rooms</a>
                        </li>
                        <li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</button>

                            </form>
                        </li>


                    </ul>
                </div>
            </div>

            <script>
                document.getElementById('dropdownDefaultButton').addEventListener('click', function() {
                    var dropdown = document.getElementById('dropdown');
                    if (dropdown.classList.contains('hidden')) {
                        dropdown.classList.remove('hidden');
                    } else {
                        dropdown.classList.add('hidden');
                    }
                });

                // Optional: Hide the dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    var dropdownButton = document.getElementById('dropdownDefaultButton');
                    var dropdown = document.getElementById('dropdown');
                    if (!dropdownButton.contains(event.target) && !dropdown.contains(event.target)) {
                        dropdown.classList.add('hidden');
                    }
                });
            </script>






        </div>

        </div>


    </header>
    @yield('content')

    <footer class="footer bg-cyan-500 py-16 text-white">
        <div class="footer-container container mx-auto flex justify-between">
            <div>
                <h2 class="text-2xl font-bold">RoomKhoj</h2>
                <div class="footer-box mt-4">
                    <h3 class="text-lg font-semibold">Quick Links</h3>
                    <ul>
                        <li><a href="#" class="block mt-2">Agency</a></li>
                        <li><a href="#" class="block mt-2">Rooms</a></li>
                        <li><a href="#" class="block mt-2">Rates</a></li>
                        <li><a href="/dashboard" class="block mt-2">Admin</a></li>
                    </ul>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold">Locations</h3>
                <ul>
                    <li><a href="#" class="block mt-2">Nawalpur</a></li>
                    <li><a href="#" class="block mt-2">Chitwan</a></li>
                    <li><a href="#" class="block mt-2">Palpa</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold">Contact</h3>
                <ul>
                    <li><a href="#" class="block mt-2">+97798234156</a></li>
                    <li><a href="mailto:yourmail@gmail.com" class="block mt-2">yourmail@gmail.com</a></li>
                </ul>
                <div class="social flex mt-4 gap-4">
                    <a href="#"><i class='bx bxl-facebook text-2xl'></i></a>
                    <a href="#"><i class='bx bxl-twitter text-2xl'></i></a>
                    <a href="#"><i class='bx bxl-instagram text-2xl'></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright -->
    <div class="copyright bg-gray-900 text-center py-4 text-gray-500">
        <p>&#169; Subash All Rights Reserved</p>
    </div>

</body>
</html>