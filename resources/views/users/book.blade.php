<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roomkhoj.com</title>
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gray-100 text-gray-900">
    <!-- Navbar -->
    <header class="bg-gradient-to-r from-cyan-500 to-blue-500 shadow-lg">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <!-- Logo -->
            <a href="index.php" class="flex items-center">
                <img src="https://st3.depositphotos.com/27847728/35061/v/1600/depositphotos_350616384-stock-illustration-abstract-letter-logo-design-vector.jpg"
                    alt="RoomKhoj Logo" class="h-16">
                <span class="ml-3 text-2xl font-bold text-white">RoomKhoj</span>
            </a>
            <!-- Nav List -->
            <ul class="flex gap-6">
                <li><a href="#home" class="text-white font-semibold hover:text-gray-300">Dashboard</a></li>
                <li><a href="/about" class="text-white font-semibold hover:text-gray-300">About Us</a></li>
                <li><a href="#" class="text-white font-semibold hover:text-gray-300">Notifications</a></li>
                <li><a href="#properties" class="text-white font-semibold hover:text-gray-300">Rooms</a></li>
            </ul>
        </div>
    </header>

    <!-- Hero Section -->
   <h1 class="text-3xl font-bold text-center mt-10">Book a Room</h1>

    <!-- Room Information Section -->
    <section class="container mx-auto mt-10 px-6">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden md:flex">
            <!-- Room Image -->
            <div class="w-full md:w-1/2">
                <img src="{{ asset('image/rooms/' . $room->photopath) }}" alt="Room Image" class="w-full h-full object-cover">
            </div>
            <!-- Room Details -->
            <div class="p-6 md:w-1/2">
                
                <p class="text-lg mb-2">Room No: <span class="font-semibold">{{ $room->room_no }}</span></p>
                <p class="text-lg mb-2">Price: <span class="text-green-500 font-semibold">RS{{ $room->price }}</span></p>
                <p class="text-lg mb-2">location: {{ $room->name }}</p>

                <p class="text-lg mb-2">Availability: <span class="{{ $room->stock > 0 ? 'text-green-500' : 'text-red-500' }}">{{ $room->stock > 0 ? 'Available' : 'Out of Stock' }}</span></p>

                <h4 class="text-xl font-semibold mt-4">Description</h4>
                <p class="mt-2 text-gray-700">{{ $room->description }}</p>

              

                <!-- Call to action -->
                <div class="mt-6">
                    <a href="#"
                        class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-6 py-2 rounded-lg hover:from-green-500 hover:to-blue-600 transition ease-in-out duration-300">Book Now</a>
                </div>
            </div>
        </div>

    </section>
    <!-- related rooms -->
     <h1 class="text-3xl font-bold text-center mt-10">Related Rooms</h1>
        <hr class="h-1 bg-amber-600 mb-8">
        <div class="container mx-auto py-12">
        <!-- Display Results -->
        
    <section class="properties container mx-auto" id="properties">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 px-8">
                    @foreach($relatedRooms as $related)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300">
                        <img src="{{ asset('image/rooms/'.$related->photopath) }}" alt="room" class="w-full h-64 object-cover rounded-t-lg">
                        <div class="p-5">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Room No: {{ $related->room_no }}</h2>
                            <p class="text-gray-600 mb-4">Located in: {{ $related->name }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-semibold text-blue-500">Rs. {{ number_format($related->price) }}</span>
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Rent</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </section>

    <!-- Footer -->
    <footer class="footer bg-gradient-to-r from-cyan-500 to-blue-500 py-16 text-white mt-10">
        <div class="container mx-auto flex justify-between px-6">
            <div>
                <h2 class="text-3xl font-bold">RoomKhoj</h2>
                <div class="footer-box mt-4">
                    <h3 class="text-lg font-semibold">Quick Links</h3>
                    <ul>
                        <li><a href="#" class="block mt-2 hover:text-gray-300">Agency</a></li>
                        <li><a href="#" class="block mt-2 hover:text-gray-300">Rooms</a></li>
                        <li><a href="#" class="block mt-2 hover:text-gray-300">Rates</a></li>
                        <li><a href="/dashboard" class="block mt-2 hover:text-gray-300">Admin</a></li>
                    </ul>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold">Locations</h3>
                <ul>
                    <li><a href="#" class="block mt-2 hover:text-gray-300">Nawalpur</a></li>
                    <li><a href="#" class="block mt-2 hover:text-gray-300">Chitwan</a></li>
                    <li><a href="#" class="block mt-2 hover:text-gray-300">Palpa</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold">Contact</h3>
                <ul>
                    <li><a href="#" class="block mt-2 hover:text-gray-300">+97798234156</a></li>
                    <li><a href="mailto:yourmail@gmail.com" class="block mt-2 hover:text-gray-300">yourmail@gmail.com</a></li>
                </ul>
                <div class="social flex mt-4 gap-4">
                    <a href="#"><i class='bx bxl-facebook text-2xl hover:text-gray-300'></i></a>
                    <a href="#"><i class='bx bxl-twitter text-2xl hover:text-gray-300'></i></a>
                    <a href="#"><i class='bx bxl-instagram text-2xl hover:text-gray-300'></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright -->
    <div class="bg-gray-900 text-center py-4 text-gray-400">
        <p>&#169; 2024 RoomKhoj. All Rights Reserved</p>
    </div>

</body>

</html>
