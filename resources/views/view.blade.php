@extends('layouts.app')

@section('content')

    <!-- Hero Section -->
    <h1 class="text-3xl font-bold text-center mt-10">Booked Room</h1>

    <!-- Back Button -->
    <div class="container mx-auto mt-6">
        <a href="{{ route('dashboard') }}" class="inline-block bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400 transition duration-300">Back</a>
    </div>

    <!-- Room Information Section -->
    <section class="container mx-auto mt-10 px-6">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden md:flex">
            <div class="w-full md:w-1/2">
                <img src="{{ asset('image/rooms/' . $notifications->room->photopath) }}" alt="Room Image" class="w-full h-full object-cover">
            </div>
            <div class="p-6 md:w-1/2">
            <p class="text-lg mb-2">Booked By: <span class="font-semibold">{{ $notifications->user->name }}</span></p>
            <p class="text-lg mb-2">Email: <span class="font-semibold">{{ $notifications->user->email }}</span></p>
                <p class="text-lg mb-2">Room No: <span class="font-semibold">{{ $notifications->room->room_no }}</span></p>
                <p class="text-lg mb-2">Price: <span class="text-green-500 font-semibold">RS{{ $notifications->room->price }}</span></p>
                <p class="text-lg mb-2">Location: {{ $notifications->room->name }}</p>
                <h4 class="text-xl font-semibold mt-4">Description</h4>
                <p class="mt-2 text-gray-700">{{ $notifications->room->description }}</p>
            </div>
        </div>
    </section>

@endsection
