@extends('layouts.app')
@section('content')

    <h2 class="font-bold text-3xl text-amber-600">Edit User</h2>
    <hr class="h-1 bg-amber-600">

    <div class="mt-10">
        <form action="{{ route('useradmin.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <input type="text" class="border p-3 w-full rounded-lg" name="name" placeholder="Name" value="{{ old('name', $user->name) }}">
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <input type="email" class="border p-3 w-full rounded-lg" name="email" placeholder="Email" value="{{ old('email', $user->email) }}">
                @error('email')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <input type="text" class="border p-3 w-full rounded-lg" name="phonenumber" placeholder="Phone" value="{{ old('phonenumber', $user->phonenumber) }}">
                @error('phonenumber')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                <input type="date" class="border p-3 w-full rounded-lg" name="dob" value="{{ old('dob', $user->dob) }}">
                @error('dob')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <input type="file" class="border p-3 w-full rounded-lg" name="photopath">
                @error('photopath')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-center gap-5">
                <button type="submit" class="bg-blue-600 text-white py-3 px-10 rounded-lg">Update</button>
                <a href="{{ route('useradmin.index') }}" class="bg-red-500 text-white py-3 px-7 rounded-lg">Cancel</a>
            </div>
        </form>
    </div>

@endsection
