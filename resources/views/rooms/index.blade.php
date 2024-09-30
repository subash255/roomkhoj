@extends('layouts.app')
@section('content')
    <h2 class="font-bold text-3xl text-amber-600">Categories</h2>
    <hr class="h-1 bg-amber-600">

    <div class="mt-10 text-right">
        <a href="{{route('rooms.create')}}" class="bg-amber-600 text-white p-3 rounded-lg">Add Rooms</a>
    </div>

    <div class="mt-10">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-3">Room no</th>
                    <th class="border p-3">Place</th>
                    <th class="border p-3">Price</th>
                    <th class="border p-3">Image</th>
                    <th class="border p-3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($rooms as $room)
                <tr class="text-center">
                    <td class="border p-3">{{$room->room_no}}</td>
                    <td class="border p-3">{{$room->name}}</td>
                    <td class="border p-3">{{$room->price}}</td>
                    <td class="border p-3">
                        <img src="{{asset('image/rooms/'.$room->photopath)}}" class="w-24" alt="">
                    </td>
                    <td class="border p-3">
                        <a href="{{route('rooms.edit', $room->id)}}" class="bg-blue-500 text-white p-2 rounded-lg">Edit</a>

                        <form action="{{ route('rooms.delete', $room->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white p-2 rounded-lg"
                                    onclick="return confirm('Are you sure you want to delete this room?');">
                                Delete
                            </button>
                        </form>

                        <a href="" class="bg-green-500 text-white p-2 rounded-lg">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
