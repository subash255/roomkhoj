<!-- Logo Section -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="flex flex-col items-center mb-4">
    <img src="{{ asset('img/logo.png') }}" alt="RoomKhoj Logo" class="h-16 w-16 rounded-full border-2 border-white shadow-lg"> <!-- Custom logo -->
    <span class="mt-2 text-3xl font-extrabold text-white">RoomKhoj</span> <!-- Logo text -->
</div>

<div class="max-w-md mx-auto bg-white rounded-lg shadow-xl p-8 mt-10 border border-gray-200">
    <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">{{ __('Log in to your account') }}</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-300 transition ease-in-out duration-150" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-300 transition ease-in-out duration-150" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md transition ease-in-out duration-200">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Sign Up Link -->
    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">{{ __('Don\'t have an account?') }}</p>
        <a href="{{ route('register') }}" class="underline text-indigo-600 hover:text-indigo-800">
            {{ __('Create an account') }}
        </a>
    </div>
</div>

<!-- Add a gradient background to the body -->
<style>
    body {
        background: linear-gradient(to right, #4f46e5, #6ee7b7);
        font-family: 'Inter', sans-serif; /* Ensure you include this font in your project */
    }
</style>
