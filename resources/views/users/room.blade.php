@extends('layouts.user')
@section('content')
<section class="properties container mx-auto py-10" id="properties">
    @if($rooms->isNotEmpty())
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-semibold text-gray-800 border-b-2 border-blue-500 pb-2">Yours Rooms </h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-4">
            @foreach($rooms as $room) 
                <div class="bg-white rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl overflow-hidden">
                    <img src="{{ asset('image/rooms/'.$room->photopath) }}" alt="Room {{ $room->room_no }}" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">Room No: {{ $room->room_no }}</h2>
                        <p class="text-sm text-gray-600 mb-3">Located in: {{ $room->name }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-lg font-semibold text-blue-500">Rs. {{ number_format($room->price) }}</span>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600 text-center text-lg mt-16">No rooms found.</p>
    @endif
</section>




@endsection