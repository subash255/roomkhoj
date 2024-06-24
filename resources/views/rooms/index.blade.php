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
                    <th class="border p-3">price</th>
                    <th class="border p-3">image</th>
                    <th class="border p-3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($rooms as $room)
                <tr class="text-center">
                    <td class="border p-3">{{$room->name}}</td>
                    <td class="border p-3">{{$room->place}}</td>
                    <td class="border p-3">{{$room->price}}</td>
                    <td class="border p-3"> <img src="{{asset('image/rooms/'.$room->photopath)}}" class="w-24" alt=""></td>
                    
                    <td class="border p-3">
                        <a href="{{route('rooms.edit',$room->id)}}" class="bg-blue-500 text-white p-2 rounded-lg">Edit</a>
                        <a href="{{route('rooms.delete')}" class="bg-red-500 text-white p-2 rounded-lg">Delete</a>
                        <a href="" class="bg-red-500 text-white p-2 rounded-lg">View</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
