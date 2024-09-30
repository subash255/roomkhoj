@extends('layouts.app')

@section('content')

<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold text-center">Booked Rooms</h1>
    <hr class="h-1 bg-amber-600 mb-8">

    @if($notifications->isNotEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-4">
            @foreach($notifications as $booking)
                <div class="bg-white rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl overflow-hidden">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">
                            {{ $booking->user->name }} booked room {{ $booking->room->no }}
                        </h2>
                        <p class="text-sm text-gray-600 mb-3">Booking Status: {{ $booking->status }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-sm font-semibold text-blue-500">{{ $booking->created_at->diffForHumans() }}</span>
                        </div>
                        <a href="{{ route('view', $booking->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 mt-4 block text-center">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600 text-center text-lg mt-16">No booked rooms found.</p>
    @endif

@endsection
