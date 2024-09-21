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

    <!-- Dashboard -->
    <section class="home container mx-auto py-16 text-center relative" style="background-image: url('{{asset('img/home.jpg')}}'); background-size: cover; background-position: center;">
    <div class="bg-black bg-opacity-50 h-full w-full absolute top-0 left-0"></div>
    <h1 class="text-5xl font-bold text-white mb-4 drop-shadow relative">Find Your Next <br>Perfect Place To <br>Live.</h1>
    <a href="/register" class="btn bg-cyan-600 text-white py-2 px-6 rounded-lg hover:bg-cyan-700 transition relative">Sign Up</a>
</section>


    <!-- Search for Rooms -->
    <form action="{{ url('/search') }}" method="GET" class="container mx-auto py-8 px-4 bg-white rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-center mb-4">Search for Rooms</h2>
        <div class="space-y-4">
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <input type="text" name="location" id="location" placeholder="Enter location"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="min_price" class="block text-sm font-medium text-gray-700">Min Price</label>
                    <input type="number" name="min_price" id="min_price" placeholder="Min Price"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm">
                </div>
                <div>
                    <label for="max_price" class="block text-sm font-medium text-gray-700">Max Price</label>
                    <input type="number" name="max_price" id="max_price" placeholder="Max Price"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm">
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="w-64  bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Search
                </button>
            </div>
        </div>
    </form>

    <!-- Sales Section -->
    <section class="sales container mx-auto py-16" id="sales">
        <div class="flex justify-around">
            <div class="box p-4 bg-white rounded-lg shadow-md text-center hover:shadow-lg transition">
                <i class='bx bx-user text-4xl mb-4'></i>
                <h3 class="text-xl font-semibold mb-2">Make Yourself Easy</h3>
                <p class="text-gray-600">Find your dream room with ease and convenience.</p>
            </div>
            <div class="box p-4 bg-white rounded-lg shadow-md text-center hover:shadow-lg transition">
                <i class='bx bx-desktop text-4xl mb-4'></i>
                <h3 class="text-xl font-semibold mb-2">Start Your New Platform</h3>
                <p class="text-gray-600">Join us and explore countless rental opportunities.</p>
            </div>
            <div class="box p-4 bg-white rounded-lg shadow-md text-center hover:shadow-lg transition">
                <i class='bx bx-home-alt text-4xl mb-4'></i>
                <h3 class="text-xl font-semibold mb-2">Enjoy Your New Rooms</h3>
                <p class="text-gray-600">Comfort and affordability await you.</p>
            </div>
        </div>
    </section>

    <!-- Properties -->
    <section class="properties container mx-auto py-16" id="properties">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold">Available Rooms</h2>
            <p class="text-gray-600">Explore our selection of rooms tailored to your needs.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 my-10 px-4">
            @foreach($rooms as $room)
            <div class="p-4 bg-white rounded-lg shadow transition hover:shadow-lg">
                <img src="{{ asset('image/rooms/'.$room->photopath) }}" alt="room" class="w-full h-64 object-cover rounded-t-lg">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">Room No: {{ $room->room_no }}</h2>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-xl font-thin">Rs. {{ number_format($room->price) }}</span>
                        <span class="text-xl font-thin"> {{ ($room->name) }}</span>

                        <button class="bg-blue-500 text-white px-4 py-1 rounded-lg hover:bg-blue-600 transition">Rent</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- About -->
    <section class="about container mx-auto py-16 flex items-center" id="about">
        <div class="w-1/2 pr-8">
            <img src="{{asset('img/p6.jpg')}}" alt="About Us" class="rounded-lg shadow-md">
        </div>
        <div class="w-1/2 pl-8">
            <span class="text-lg font-semibold text-cyan-500">About Us</span>
            <h2 class="text-3xl font-bold mb-4">We Provide The Best <br>Rooms For You!</h2>
            <p class="text-gray-600 mb-4">At RoomKhoj, we're more than just a room rental platform – we're your gateway to unforgettable experiences and hassle-free accommodations. Our passion for connecting travelers with comfortable and curated stays drives everything we do.</p>
            <a href="/about" class="btn bg-cyan-600 text-white py-2 px-6 rounded-lg hover:bg-cyan-700 transition">Learn More</a>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter container mx-auto py-16 text-center bg-gray-200 rounded-lg">
        <h2 class="text-3xl font-bold mb-4">Have a Question in Mind? <br>Let Us Help You</h2>
        <form action="" class="flex justify-center">
            <input type="email" id="email-box" placeholder="yourmail@gmail.com" class="py-2 px-4 border border-gray-300 rounded-l-lg" required>
            <input type="submit" value="Send" class="btn2 bg-cyan-600 text-white py-2 px-4 rounded-r-lg hover:bg-cyan-700 transition">
        </form>
    </section>

    <!-- Footer -->
    <footer class="footer bg-cyan-600 py-16 text-white">
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
