<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roomkhoj.com</title>
    <!-- Link to CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gray-100 text-gray-900">
    <!-- Navbar -->
    <header class="bg-cyan-500">
        <div class="container mx-auto flex items-center justify-between p-4">
            <!-- Logo -->
            <a href="index.php" class="flex items-center">
                <img src="https://st3.depositphotos.com/27847728/35061/v/1600/depositphotos_350616384-stock-illustration-abstract-letter-logo-design-vector.jpg" alt="RoomKhoj Logo" class="h-16">
                <span class="ml-2 text-2xl font-bold text-white">RoomKhoj</span>
            </a>
            <!-- Nav List -->
            <ul class="flex gap-6">
                <li><a href="#home" class="text-white font-semibold">Dashboard</a></li>
                <li><a href="/about" class="text-white font-semibold">About Us</a></li>
                <li><a href="#" class="dropdown-arrow text-white font-semibold">Notifications</a></li>
                <li><a href="#properties" class="text-white font-semibold">Rooms</a></li>
            </ul>

            <div class="relative inline-block text-left">
                <!-- Dropdown trigger image -->
                <img id="dropdownDefaultButton" src="path/to/your/image.jpg" alt="Dropdown trigger" class="cursor-pointer w-10 h-10 rounded-full mr-8">

                <!-- Dropdown menu -->
                <div id="dropdown" class="absolute left-0 mt-2 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="{{ route('users.profile',['id' => $user->id]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rooms</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
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
                    dropdown.classList.toggle('hidden');
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
    </header>

    <section class="properties container mx-auto py-10" id="properties">
    @if($rooms->isNotEmpty())
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-semibold text-gray-800 border-b-2 border-blue-500 pb-2">Rooms Located At {{ ucfirst($name) }} </h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-4">
            @foreach($rooms as $room) 
                <div class="bg-white rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl overflow-hidden">
                    <img src="{{ asset('image/rooms/'.$room->photopath) }}" alt="Room {{ $room->room_no }}" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">Room No: {{ $room->room_no }}</h2>
                        <p class="text-sm text-gray-600 mb-3">Located in: {{ $room->name }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-lg font-semibold text-blue-500">Rs. {{ number_format($room->price) }}</span>
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 font-semibold shadow">Rent</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600 text-center text-lg mt-16">No rooms found.</p>
    @endif
</section>

</body>

</html>
