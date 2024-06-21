@extends('layouts.app')
@section('content')
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
@endsection;