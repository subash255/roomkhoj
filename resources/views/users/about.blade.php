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
    <header class="bg-cyan-600 shadow-lg">
    <div class="container mx-auto flex items-center justify-between py-2">
        <a href="{{route('users.index')}}" class="flex flex-col items-center">
            <img src="{{asset('img/logo.png')}}" alt="RoomKhoj Logo" class="h-14 w-14 rounded-full border-2 border-white shadow-lg"> <!-- Smaller logo size -->
            <span class="mt-1 text-lg font-bold text-white">RoomKhoj</span> <!-- Logo text adjusted -->
        </a>
        <nav>
            <ul class="flex gap-8">
                <li><a href="#home" class="text-white font-semibold text-lg hover:text-gray-200 transition duration-300">Home</a></li> <!-- Increased text size -->
                <li><a href="/about" class="text-white font-semibold text-lg hover:text-gray-200 transition duration-300">About Us</a></li>
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
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rooms</a>
                </li>
                <li>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                    <button  class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</button>

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

  <!-- Header -->
  <header class="bg-white shadow-sm">
    <div class="container mx-auto text-center py-12">
      <h1 class="text-5xl font-bold text-gray-800">About Us</h1>
      <p class="text-lg text-gray-500 mt-4">Get to know more about our journey and why we are your best choice for finding the perfect room.</p>
    </div>
  </header>

  <!-- About Us Content -->
  <section class="container mx-auto px-4 py-12">
    <div class="flex flex-wrap items-center mb-16">
      <!-- Mission Section -->
      <div class="about-text w-full lg:w-1/2 mb-8 lg:mb-0 px-4">
        <h2 class="text-3xl font-semibold text-cyan-500 mb-4">Our Mission</h2>
        <p class="text-lg text-gray-700 leading-relaxed mb-6">
          Our mission is to make travel seamless and personalized, one room at a time. We believe that where you stay shapes how you experience a destination. That's why we're dedicated to providing a diverse range of accommodations that suit every traveler's style, budget, and needs.
        </p>
        <h2 class="text-3xl font-semibold text-cyan-500 mb-4">Why Choose Us?</h2>
        <ul class="list-disc list-inside text-lg text-gray-700 space-y-3">
          <li><strong>Diverse Selection:</strong> From cozy apartments to luxurious villas, we offer a variety of options tailored to your preferences.</li>
          <li><strong>Ease of Use:</strong> Our platform is user-friendly and intuitive, making the booking process smooth and stress-free.</li>
          <li><strong>Trust and Safety:</strong> We rigorously vet every property and host to ensure your peace of mind during your stay.</li>
          <li><strong>Local Insights:</strong> Discover hidden gems and local tips from hosts who know the area intimately.</li>
          <li><strong>Exceptional Support:</strong> Our dedicated team is ready to assist you at every step, from browsing to booking.</li>
        </ul>
      </div>
      <!-- Image Section -->
      <div class="about-image w-full lg:w-1/2 px-4">
        <img src="img/png.png" alt="Our Mission Image" class="rounded-lg shadow-md w-full">
      </div>
    </div>

    <!-- Our Story Section -->
    <div class="mb-16">
      <h2 class="text-3xl font-semibold text-cyan-600 mb-4">Our Story</h2>
      <p class="text-lg text-gray-700 leading-relaxed mb-6">
        RoomKhoj was founded by Subash in [Year]. Driven by a passion for travel and a vision for a personalized accommodation experience, Subash created a platform that connects travelers with unique and welcoming spaces around the world.
      </p>
      <p class="text-lg text-gray-700 leading-relaxed mb-6">
        Since then, RoomKhoj has evolved into a thriving community of travelers and hosts, united by a love for exploration and hospitality. Our journey is shaped by the stories of every guest who finds comfort in our accommodations and every host who opens their doors to create unforgettable memories.
      </p>
    </div>

    <!-- Join Us Section -->
    <div class="join-us mb-16">
      <h2 class="text-3xl font-semibold text-cyan-600 mb-4">Join Us</h2>
      <p class="text-lg text-gray-700 leading-relaxed">
        Whether you're an avid traveler seeking your next adventure or a property owner looking to share your space, RoomKhoj welcomes you to our community. Experience travel like never before, one room at a time.
      </p>
    </div>

    <!-- Image Gallery Section -->
    <div class="images-container grid grid-cols-1 md:grid-cols-2 gap-6 mb-16">
      <img src="image1.jpg" alt="Our Team" class="rounded-lg shadow-lg">
      <img src="image2.jpg" alt="Our Mission" class="rounded-lg shadow-lg">
    </div>
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
