@extends('layouts.user')
@section('content')


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
                <h2 class="text-3xl font-semibold text-gray-800 border-b-2 border-blue-500 pb-2">Rooms From{{ ucfirst($name) }} </h2>
                <a href="{{ url('users/moreroom?name=' . urlencode($name)) }}" class="text-blue-600 hover:underline font-medium">Show More</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 px-4">
                @foreach($roomGroup->take(3) as $room)  <!-- Show only 3 rooms from the group -->
                    <div class="bg-white rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl overflow-hidden">
                        <img src="{{ asset('image/rooms/'.$room->photopath) }}" alt="Room {{ $room->room_no }}" class="w-full h-48 object-cover rounded-t-lg">
                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-800 mb-1">Room No: {{ $room->room_no }}</h2>
                            <p class="text-sm text-gray-600 mb-3">Location: {{ $room->name }}</p>
                            <p class="text-sm text-gray-500 mb-3">Amenities: {{ $room->amenities }}</p>
                            <div class="flex justify-between items-center mt-4">
                                <span class="text-lg font-semibold text-blue-500">Rs. {{ number_format($room->price) }}</span>
                                <form action="{{ route('users.book', ['id' => $room->id]) }}" method="post">
                            @csrf
                            <button class="bg-blue-500 text-white px-2 py-1 rounded-lg hover:bg-blue-600 transition duration-300">Rent</button>
                        </form></div>
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
    @endsection