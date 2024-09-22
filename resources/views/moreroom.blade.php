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

    <!-- Back Button -->
    <div class="container mx-auto mt-4">
        <a href="javascript:history.back()" class="inline-flex items-center px-4 py-2 text-white bg-cyan-600 rounded-lg hover:bg-cyan-500 transition duration-300">
            <i class="bx bx-arrow-back mr-2"></i> Back
        </a>
    </div>

    <section class="properties container mx-auto py-10" id="properties">
    @if($rooms->isNotEmpty())
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-semibold text-gray-800 border-b-2 border-blue-500 pb-2">Rooms Located At {{ ucfirst($name) }}</h2>
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
