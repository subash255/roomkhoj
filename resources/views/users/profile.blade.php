

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="bg-gray-600 h-16 flex items-center justify-center text-white">
        <h1 class="text-xl">USER PROFILE</h1>
    </div>

    <div class="border-4 border-black rounded-xl mt-8 mx-auto max-w-2xl p-6 bg-white shadow-md">
        <div class="flex justify-center mb-5">
            <img src="path_to_image.jpg" alt="Profile Image" class="h-36 w-36 rounded-full object-cover shadow-lg">
        </div>
        <div class="h-1 w-3/4 mx-auto bg-black my-4"></div>
        <div class="profile-info">
            <h2 class="ml-2 text-2xl">Name:{{$user->name}}</h2>
            <h3 class="ml-2 text-lg">Email:{{$user->email}}</h3>
            <h3 class="ml-2 text-lg">Phone Number: 123-456-7890</h3>
            <h3 class="ml-2 text-lg">D.O.B: 01/01/1990</h3>
        </div>
        <div class="text-center mt-5">
            <a href="{{route('users.edit',$user->id)}}" class="inline-block py-2 px-4 bg-gray-600 text-white rounded-full hover:bg-blue-500 transition-colors">Edit Profile</a>
        </div>

        <div class="text-center mt-5">
        <a href="{{ route('users.index') }}" class="inline-block py-2 px-4 bg-gray-600 text-white rounded-full hover:bg-blue-500 transition-colors">Back</a>

        </div>
    </div>
</body>
</html>
