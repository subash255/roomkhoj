@extends('layouts.user')
@section('content')
<body class="bg-gray-50">
    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-12">Rooms near {{ $name ?? 'your search' }}</h1>

        <!-- Display Results -->
        <section class="properties container mx-auto" id="properties">
            @if($properties->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 px-8">
                    @foreach($properties as $property)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300">
                        <img src="{{ asset('image/rooms/'.$property->photopath) }}" alt="room" class="w-full h-64 object-cover rounded-t-lg">
                        <div class="p-5">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Room No: {{ $property->room_no }}</h2>
                            <p class="text-gray-600 mb-4">Located in: {{ $property->location }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-semibold text-blue-500">Rs. {{ number_format($property->price) }}</span>
                                <form action="{{ route('users.book', ['id' => $room->id]) }}" method="post">
                            @csrf
                            <button class="bg-blue-500 text-white px-2 py-1 rounded-lg hover:bg-blue-600 transition duration-300">Rent</button>
                        </form></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center text-lg mt-16">No rooms found matching your criteria.</p>
            @endif
        </section>

        <div class="mt-12 text-center">
            <a href="{{ url('users/index') }}" 
               class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
               Back to Search
            </a>
        </div>
    </div>
@endsection
