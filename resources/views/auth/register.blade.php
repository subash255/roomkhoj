<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
 
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white rounded-lg shadow-lg max-w-4xl w-full overflow-hidden">
        <div class="md:flex">
            <div class="hidden md:block md:w-1/2 bg-cover" style="background-image: url('https://source.unsplash.com/8QhdGP6ycdo/600x800');">
                <div class="flex items-center justify-center h-full bg-purple-800 bg-opacity-50">
                    <div class="text-center text-white p-6">
                        <h2 class="text-4xl font-bold mb-2">Welcome</h2>
                        <p class="mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean suspendisse aliquam varius rutrum purus maecenas ac.</p>
                        <a href="#" class="text-indigo-200 underline">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 p-8">
                <h2 class="text-3xl font-bold text-purple-800 mb-4">Register</h2>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf   
                <div class="mb-4">
                        <input type="text" name="name" placeholder="First Name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
                    <div class="mb-4">
                        <input type="email" name="email" placeholder="Email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
                <div class="mb-4">
        <input type="password" name="password" placeholder="Password" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required autocomplete="new-password">
        @error('password')
        <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-4">
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required autocomplete="new-password">
    </div>
                    @error('password_confirmation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror

                    <div class="flex mb-4">
                        <input type="text" name="phonenumber" placeholder="Phone Number" class="w-1/2 p-3 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <input type="date" name="dob" placeholder="Date of Birth" class="w-1/2 p-3 border border-gray-300 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div class="mb-4">
                        <input type="file" name="photopath" placeholder="Photo" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div class="flex items-center mb-4">
                        <input type="checkbox" name="terms" id="terms" class="mr-2">
                        <label for="terms" class="text-gray-700 text-sm">I accept the <a href="#" class="text-purple-600 underline">Terms of Use</a> & <a href="#" class="text-purple-600 underline">Privacy Policy</a></label>
                    </div>
                    <button type="submit" class="w-full p-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">Register Now</button>
                </form>
            </div>
        </div>
    </div>
   
</body>
</html>
