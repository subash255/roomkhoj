@extends('layouts.user')
@section('content')

<section class="home w-full py-24 text-center relative">
    <img src="{{ asset('img/home.jpg') }}" alt="Home Background" class="absolute inset-0 w-full h-full object-cover">
    <div class="bg-black bg-opacity-50 h-full w-full absolute top-0 left-0"></div>
    <h1 class="text-5xl font-bold text-white mb-4 drop-shadow relative">Find Your Next <br>Perfect Place To <br>Live.</h1>
 </section>


    


    <!-- Search for Rooms -->
    <form action="{{ url('users/search') }}" method="GET" class="container mx-auto py-8 px-6 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-semibold text-center mb-4">Search for Rooms</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
        <!-- Location Field -->
        <div>
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
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
                          
                        <form action="{{ route('users.book', ['id' => $room->id]) }}" method="get">
                            @csrf
                            <button class="bg-blue-500 text-white px-2 py-1 rounded-lg hover:bg-blue-600 transition duration-300">Rent</button>
                        </form></div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="flex justify-center mt-10">
        <a href="{{ route('users.showroom') }}" class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transition duration-300">
            Show More Rooms
        </a>
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
            <a href="{{route('users.about')}}" class="btn bg-cyan-600 text-white py-2 px-6 rounded-lg hover:bg-cyan-700 transition">Learn More</a>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter container mx-auto py-16 text-center bg-gray-200 rounded-lg">
        <h2 class="text-3xl font-bold mb-4">Have a Question in Mind? <br>Let Us Help You</h2>
        <form action="" class="flex justify-center">
            <input type="email" id="email-box" placeholder="yourmail@gmail.com" class="py-2 px-4 border border-gray-300 rounded-l-lg" required>
            <input type="submit" value="Send" class="btn2 bg-cyan-500 text-white py-2 px-4 rounded-r-lg hover:bg-cyan-700 transition">
        </form>
    </section>
    @endsection