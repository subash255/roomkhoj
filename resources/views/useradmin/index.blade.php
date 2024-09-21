@extends('layouts.app')
@section('content')
    <h2 class="font-bold text-3xl text-amber-600">Users History</h2>
    <hr class="h-1 bg-amber-600">

    <div class="mt-10 text-right">
        <!-- <a href="{{route('categories.create')}}" class="bg-amber-600 text-white p-3 rounded-lg">Add Rooms</a> -->
    </div>

    <div class="mt-10">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-3">Name</th>
                    <th class="border p-3">Email</th>
                    <th class="border p-3">D.O.B</th>
                    <th class="border p-3">Phone</th>
                    <th class="border p-3">Image</th>
                    <th class="border p-3">Action</th>

                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="text-center">
                    <td class="border p-3">{{$user->name}}</td>
                    <td class="border p-3">{{$user->email}}</td>
                    <td class="border p-3">{{$user->dob}}</td>
                    <td class="border p-3">{{$user->phone}}</td>
                    <td  class="border p-3">img</td>
                    <td class="border p-3">
                        <a href="{{route('useradmin.edit',$user->id)}}" class="bg-blue-500 text-white p-2 rounded-lg">Edit</a>
                        <a href="" class="bg-red-500 text-white p-2 rounded-lg">Delete</a>
                        <a href="" class="bg-red-500 text-white p-2 rounded-lg">View</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


<!-- "{{route('categories.delete',$user->id)}}  -->