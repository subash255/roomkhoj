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
    <header class="bg-cyan-600 shadow">
        <div class="container mx-auto flex items-center justify-between p-4">
            <a href="index.php" class="flex items-center">
                <img src="https://st3.depositphotos.com/27847728/35061/v/1600/depositphotos_350616384-stock-illustration-abstract-letter-logo-design-vector.jpg" alt="RoomKhoj Logo" class="h-16">
                <span class="ml-2 text-2xl font-bold text-white">RoomKhoj</span>
            </a>
            <ul class="flex gap-6">
                <li><a href="#home" class="text-white font-semibold hover:text-gray-300 transition">Home</a></li>
                <li><a href="/about" class="text-white font-semibold hover:text-gray-300 transition">About Us</a></li>
                <li><a href="#sales" class="text-white font-semibold hover:text-gray-300 transition">Rents</a></li>
                <li><a href="#properties" class="text-white font-semibold hover:text-gray-300 transition">Rooms</a></li>
            </ul>
            <a href="{{route('login')}}" class="btn bg-white text-cyan-600 py-2 px-4 rounded-lg hover:bg-gray-200 transition">Log In</a>
        </div>
    </header>

    <!-- Search for Rooms -->
    <form action="{{ url('users/search') }}" method="GET" class="container mx-auto py-8 px-6 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-semibold text-center mb-4">Search for Rooms</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
        <!-- Location Field -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" name="name" id="location" placeholder="Enter location" required maxlength="255"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm">
            @error('location')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Min Price Field -->
        <div>
            <label for="min_price" class="block text-sm font-medium text-gray-700">Min Price</label>
            <input type="number" name="min_price" id="min_price" placeholder="Min Price" min="0"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm">
            @error('min_price')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Max Price Field -->
        <div>
            <label for="max_price" class="block text-sm font-medium text-gray-700">Max Price</label>
            <input type="number" name="max_price" id="max_price" placeholder="Max Price" min="0"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm">
            @error('max_price')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Search Button -->
        <div class="flex justify-center">
            <button type="submit"
                class="w-full bg-cyan-500 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Search
            </button>
        </div>
    </div>
</form>

    <section class="properties container mx-auto py-10" id="properties">
    @if($rooms->isNotEmpty())
        @foreach($rooms as $name => $roomGroup)
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-semibold text-gray-800 border-b-2 border-blue-500 pb-2">Rooms From {{ ucfirst($name) }}</h2>
                <a href="{{ url('/moreroom?name=' . urlencode($name)) }}" class="text-blue-600 hover:underline font-medium">Show More</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 px-4">
                @foreach($roomGroup->take(3) as $room)  
                    <div class="bg-white rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl overflow-hidden">
                        <img src="{{ asset('image/rooms/'.$room->photopath) }}" alt="Room {{ $room->room_no }}" class="w-full h-48 object-cover rounded-t-lg">
                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-800 mb-1">Room No: {{ $room->room_no }}</h2>
                            <p class="text-sm text-gray-600 mb-3">Location: {{ $room->name }}</p>
                            <p class="text-sm text-gray-500 mb-3">Amenities: {{ $room->amenities }}</p>
                            <div class="flex justify-between items-center mt-4">
                                <span class="text-lg font-semibold text-blue-500">Rs. {{ number_format($room->price) }}</span>
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 font-semibold shadow">Rent</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <p class="text-gray-600 text-center text-lg mt-16">No rooms found.</p>
    @endif
    </section>

    <!-- Footer -->
    <footer class="footer bg-cyan-500 py-16 text-white">
        <div class="footer-container container mx-auto flex justify-between">
            <div>
                <h2 class="text-2xl font-bold">RoomKhoj</h2>
                <div class="footer-box mt-4">
                    <h3 class="text-lg font-semibold">Quick Links</h3>
                    <ul>
                        <li><a href="#" class="block mt-2 hover:underline">Agency</a></li>
                        <li><a href="#" class="block mt-2 hover:underline">Rooms</a></li>
                        <li><a href="#" class="block mt-2 hover:underline">Rates</a></li>
                        <li><a href="/dashboard" class="block mt-2 hover:underline">Admin</a></li>
                    </ul>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold">Locations</h3>
                <ul>
                    <li><a href="#" class="block mt-2 hover:underline">Nawalpur</a></li>
                    <li><a href="#" class="block mt-2 hover:underline">Chitwan</a></li>
                    <li><a href="#" class="block mt-2 hover:underline">Palpa</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold">Contact</h3>
                <ul>
                    <li><a href="#" class="block mt-2 hover:underline">+97798234156</a></li>
                    <li><a href="mailto:yourmail@gmail.com" class="block mt-2 hover:underline">yourmail@gmail.com</a></li>
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
