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
    <header class="bg-cyan-600 shadow-lg">
        <div class="container mx-auto flex items-center justify-between py-2">
            <a href="{{route('users.index')}}" class="flex flex-col items-center">
                <img src="{{asset('img/logo.png')}}" alt="RoomKhoj Logo" class="h-14 w-14 rounded-full border-2 border-white shadow-lg">
                <span class="mt-1 text-lg font-bold text-white">RoomKhoj</span>
            </a>
            <nav>
                <ul class="flex gap-8">
                    <li><a href="{{Route('users.index')}}" class="text-white font-semibold text-lg hover:text-gray-200 transition duration-300">Home</a></li>
                    <li><a href="{{Route('users.index/#about')}}" class="text-white font-semibold text-lg hover:text-gray-200 transition duration-300">About Us</a></li>
                    <li><a href="#sales" class="text-white font-semibold text-lg hover:text-gray-200 transition duration-300">Rents</a></li>
                    <li><a href="#properties" class="text-white font-semibold text-lg hover:text-gray-200 transition duration-300">Rooms</a></li>
                </ul>
            </nav>
            <div class="relative inline-block text-left">
                <img id="dropdownDefaultButton" src="{{asset('image/users/'.$user->photopath)}}" alt="Dropdown trigger" class="cursor-pointer w-10 h-10 rounded-full mr-8">
                <div id="dropdown" class="absolute left-0 mt-2 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                        <li><a href="{{ route('users.profile',['id' => $user->id])}}" class="block px-4 py-2 hover:bg-gray-100">Profile</a></li>
                        <li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button class="block px-4 py-2 hover:bg-gray-100">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <h1 class="text-3xl font-bold text-center mt-10">Book a Room</h1>

    <!-- Back Button -->
    <div class="container mx-auto mt-6">
        <a href="{{ route('users.index') }}" class="inline-block bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400 transition duration-300">Back</a>
    </div>

    <!-- Room Information Section -->
    <section class="container mx-auto mt-10 px-6">
        
         <div class="bg-white rounded-lg shadow-lg overflow-hidden md:flex">
             <div class="w-full md:w-1/2">
                <img src="{{ asset('image/rooms/' . $room->photopath) }}" alt="Room Image" class="w-full h-full object-cover">
            
             </div>
            
        <div class="p-6 md:w-1/2">
             
                <p class="text-lg mb-2">Room No: <span class="font-semibold">{{ $room->room_no }}</span></p>
                <p class="text-lg mb-2">Price: <span class="text-green-500 font-semibold">RS{{ $room->price }}</span></p>
                <p class="text-lg mb-2">Location: {{ $room->name }}</p>
                <p class="text-lg mb-2">Availability: <span class="{{ $room->stock > 0 ? 'text-green-500' : 'text-red-500' }}">{{ $room->stock > 0 ? 'Available' : 'Out of Stock' }}</span></p>
                
                <h4 class="text-xl font-semibold mt-4">Description</h4>
                <p class="mt-2 text-gray-700">{{ $room->description }}</p>
                
                
                <div class="mt-6">
                    <a href="#" class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-6 py-2 rounded-lg hover:from-green-500 hover:to-blue-600 transition ease-in-out duration-300">Book Now</a>
                </div>
            </div>
        </div>

    </section>

    <!-- Related Rooms -->
    <h1 class="text-3xl font-bold text-center mt-10">Related Rooms</h1>
    <hr class="h-1 bg-amber-600 mb-8">

    <section class="properties container mx-auto" id="properties">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 px-8">
            @foreach($relatedRooms as $related)
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300">
                <img src="{{ asset('image/rooms/'.$related->photopath) }}" alt="Room" class="w-full h-64 object-cover rounded-t-lg">
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