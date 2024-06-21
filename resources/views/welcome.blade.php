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
                <li><a href="#sales" class="text-white font-semibold">Rents</a></li>
                <li><a href="#properties" class="text-white font-semibold">Rooms</a></li>
            </ul>
            <!-- Log In Button -->
            <a href="{{route('login')}}" class="btn bg-white text-cyan-500 py-2 px-4 rounded-lg">Log In</a>
        </div>
    </header>

    <!-- Dashboard -->
    <section class="home container mx-auto py-16" id="home">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-4">Find Your Next <br>Perfect Place To <br>Live.</h1>
            <a href="/register" class="btn bg-cyan-500 text-white py-2 px-6 rounded-lg">Sign Up</a>
        </div>
    </section>

    <div class="search container mx-auto my-8 p-4 bg-white rounded-lg shadow-md" id="searchForm">
        <h3 class="text-xl font-semibold mb-4">SEARCH FOR ROOMS</h3>
        <form method="post" action="search.php" class="flex">
            <input type="search" id="addressInput" placeholder="Search your location" class="flex-1 py-2 px-4 border border-gray-300 rounded-l-lg" name="search">
            <button class="btn1 bg-cyan-500 text-white py-2 px-4 rounded-r-lg" id="searchButton" name="submit">Search</button>
        </form>
    </div>

    <section class="sales container mx-auto py-16" id="sales">
        <div class="flex justify-around">
            <!-- Box 1 -->
            <div class="box p-4 bg-white rounded-lg shadow-md text-center">
                <i class='bx bx-user text-4xl mb-4'></i>
                <h3 class="text-xl font-semibold mb-2">Make Yourself Easy</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis, aut.</p>
            </div>
            <!-- Box 2 -->
            <div class="box p-4 bg-white rounded-lg shadow-md text-center">
                <i class='bx bx-desktop text-4xl mb-4'></i>
                <h3 class="text-xl font-semibold mb-2">Start Your New Platform</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis, aut.</p>
            </div>
            <!-- Box 3 -->
            <div class="box p-4 bg-white rounded-lg shadow-md text-center">
                <i class='bx bx-home-alt text-4xl mb-4'></i>
                <h3 class="text-xl font-semibold mb-2">Enjoy Your New Rooms</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis, aut.</p>
            </div>
        </div>
    </section>

    <!-- Properties -->
    <section class="properties container mx-auto py-16" id="properties">
        <div class="text-center mb-8">
            <span class="text-lg font-semibold text-cyan-500">Recent</span>
            <h2 class="text-3xl font-bold">Our Featured Rooms</h2>
            <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, laborum!</p>
        </div>
        <div class="properties-container flex flex-wrap gap-8">
            <div class="box p-4 bg-white rounded-lg shadow-md">
                <img src="img/room.jpg" alt="room image" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Room no:</h3>
                    <div class="content">
                        <div class="text mb-2">
                            <h3 class="text-lg font-semibold">The Palace</h3>
                            <p>Lorem ipsum dolor sit.</p>
                        </div>
                        <div class="icon mb-2">
                            <a href="show.php" class="text-cyan-500">Show more</a>
                        </div>
                        <button class="bg-gray-500 text-white py-2 px-4 rounded-full">Rent</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section class="about container mx-auto py-16 flex items-center" id="about">
        <div class="w-1/2 pr-8">
            <img src="img/about.jpg" alt="About Us" class="rounded-lg shadow-md">
        </div>
        <div class="w-1/2 pl-8">
            <span class="text-lg font-semibold text-cyan-500">About Us</span>
            <h2 class="text-3xl font-bold mb-4">We Provide The Best <br>Rooms For You!</h2>
            <p class="text-gray-600 mb-4">At RoomKhoj, we're more than just a room rental platform – we're your gateway to unforgettable experiences and hassle-free accommodations. Our passion for connecting travelers with comfortable and curated stays drives everything we do.</p>
            <a href="/about" class="btn bg-cyan-500 text-white py-2 px-6 rounded-lg">Learn More</a>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter container mx-auto py-16 text-center bg-gray-200 rounded-lg">
        <h2 class="text-3xl font-bold mb-4">Have a Question in Mind? <br>Let Us Help You</h2>
        <form action="" class="flex justify-center">
            <input type="email" id="email-box" placeholder="yourmail@gmail.com" class="py-2 px-4 border border-gray-300 rounded-l-lg" required>
            <input type="submit" value="Send" class="btn2 bg-cyan-500 text-white py-2 px-4 rounded-r-lg">
        </form>
    </section>

    <!-- Footer -->
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
