@extends('layouts.user')
@section('content')

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
                <form action="{{ route('users.store', $room->id) }}" method="POST">
                    @csrf
                    <!-- Hidden input to pass the room ID -->
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    
                    <!-- Submit Button -->
                    <button type="submit" class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-6 py-2 rounded-lg hover:from-green-500 hover:to-blue-600 transition ease-in-out duration-300">
                        Book Now
                    </button>
                </form>
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


@endsection