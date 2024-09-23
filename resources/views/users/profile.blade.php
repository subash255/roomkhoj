<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-gray-800 h-16 flex items-center justify-center text-white">
        <h1 class="text-xl font-semibold">User Profile</h1>
    </header>

    <!-- Profile Container -->
    <div class="border-4 border-gray-300 rounded-xl mt-8 mx-auto max-w-2xl p-6 bg-white shadow-lg">
        <div class="flex justify-center mb-6">
            <img src="{{ asset('image/users/'.$user->photopath) }}" alt="Profile Image" class="h-36 w-36 rounded-full object-cover shadow-lg border-4 border-gray-200">
        </div>

        <div class="h-1 w-3/4 mx-auto bg-gray-300 my-4"></div>

        <div class="profile-info text-gray-700">
            <h2 class="text-2xl font-bold ml-2">Name: <span class="text-gray-900">{{ $user->name }}</span></h2>
            <h3 class="text-lg ml-2">Email: <span class="text-gray-900">{{ $user->email }}</span></h3>
            <h3 class="text-lg ml-2">Phone Number: <span class="text-gray-900">{{ $user->phonenumber }}</span></h3>
            <h3 class="text-lg ml-2">D.O.B: <span class="text-gray-900">{{ $user->dob }}</span></h3>
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('users.edit', $user->id) }}" class="inline-block py-2 px-6 bg-gray-600 text-white rounded-full hover:bg-blue-500 transition-colors duration-200 shadow-md">Edit Profile</a>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('users.index') }}" class="inline-block py-2 px-6 bg-gray-300 text-gray-700 rounded-full hover:bg-gray-400 transition-colors duration-200 shadow-md">Back</a>
        </div>
    </div>
</body>

</html>
