<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Details</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center text-2xl font-bold text-gray-800">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-12 mr-3">
                RoomKhoj
            </a>

            <!-- Nav List -->
            <nav>
                <ul class="md:flex space-x-8 text-gray-700">
                    <li><a href="{{ url('/home') }}" class="hover:text-blue-500">Home</a></li>
                    <!-- Add more nav items here if needed -->
                </ul>
            </nav>
        </div>
    </header>

    <!-- Room Information Section -->
    <section class="container mx-auto mt-10">
        <div class="bg-gray-800 text-white rounded-lg shadow-lg overflow-hidden md:flex">
            <!-- Room Image -->
            <div class="w-full md:w-1/2">
                <img src="{{ asset('image/rooms/' . $room->photopath) }}" alt="Room Image" class="w-full h-full object-cover">
            </div>
            <!-- Room Details -->
            <div class="p-6 md:w-1/2">
                <h2 class="text-2xl font-bold mb-4">{{ $room->name }}</h2>
                <p class="mb-2">Room No: {{ $room->room_no }}</p>
                <p class="mb-2">Price: ${{ $room->price }}</p>
                <p class="mb-2">Availability: {{ $room->stock > 0 ? 'Available' : 'Out of Stock' }}</p>

                <h4 class="text-lg font-semibold mt-4">Description</h4>
                <p class="mt-2">{{ $room->description }}</p>

                <!-- Call to action -->
                <div class="mt-6">
                    <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Book Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-6 mt-10">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 RoomKhoj. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
