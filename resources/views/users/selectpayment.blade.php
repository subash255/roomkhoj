@extends('layouts.user')

@section('content')

<div class="container mx-auto p-6 bg-white rounded-lg shadow-lg flex flex-col lg:flex-row gap-6">

    <!-- Payment Method Selection Form and Booking Details in the same div -->
    <div class="w-full flex flex-col lg:flex-row gap-6">

        <!-- Left Side: Booking Details -->
        <div class="w-full lg:w-1/2 bg-gray-50 p-6 rounded-lg">
            <h2 class="text-2xl font-semibold mb-6">Booking Details</h2>

            <!-- User Info -->
            <div class="mb-6">
                <p class="text-lg font-semibold">Booked by: {{ auth()->user()->name }}</p>
                <p class="text-lg">Email: {{ auth()->user()->email }}</p>
            </div>

            <!-- Room Details -->
            @if($selectpayments->count() > 0)
                @foreach($selectpayments as $payment)
                    @if($payment->room_id == $room->id) <!-- Ensure this is the current room -->
                        <div class="flex items-center mt-4">
                            <img src="{{ asset('image/rooms/' . $payment->photopath) }}" alt="Room Image" class="w-32 h-32 object-cover rounded-lg mr-4"> <!-- Larger Image -->
                            <div>
                                <p class="text-lg font-semibold">Room Name: {{ $room->name }}</p> <!-- Display current room name -->
                                <p class="text-lg">Price: <span class="text-green-500 font-semibold">RS {{ number_format($room->price) }}</span></p> <!-- Display current room price -->
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <p class="text-lg">No payment information available for this booking.</p>
            @endif
        </div>

        <!-- Right Side: Payment Method Selection Form -->
        <div class="w-full lg:w-1/2 bg-gray-50 p-6 rounded-lg">
            <h1 class="text-3xl font-bold mb-6 text-center">Select Payment Method</h1>

            <!-- Payment Method Selection -->
            <form action="{{ route('users.stores', $room->id) }}" method="POST">
                @csrf
                <h2 class="text-2xl font-semibold mb-4">Choose a Payment Method</h2>
                <div class="flex flex-col space-y-4">
                    @foreach($paymentMethods as $method)
                        <label class="border rounded-lg p-4 flex items-center justify-start cursor-pointer transition-transform transform hover:scale-105 shadow-md">
                            <input type="radio" name="payment_method" value="{{ $method['id'] }}" class="mr-3" required>
                            <span class="flex items-center">
                                @if($method['id'] == 1)  <!-- Assuming eSewa has id 1 -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="w-8 h-8 mr-3">
                                        <path d="M100 0C44.8 0 0 44.8 0 100s44.8 100 100 100 100-44.8 100-100S155.2 0 100 0zm0 185c-46.8 0-85-38.2-85-85S53.2 15 100 15s85 38.2 85 85-38.2 85-85 85zm43-104.4c-4.1-2.3-8.4-3.5-13-3.5-7.2 0-14.2 2.8-19.2 7.8l-5.1 5.2-5.1-5.2c-5-5-12-7.8-19.2-7.8-4.6 0-8.9 1.2-13 3.5-8.3 4.6-13.4 13.3-13.4 22.9 0 3.4.4 6.6 1.1 9.7 2.5 11.5 9.7 21.2 19.4 26.6 4.8 2.5 10.2 3.9 15.9 3.9s11.1-1.4 15.9-3.9c9.7-5.4 16.9-15.1 19.4-26.6.7-3.1 1.1-6.3 1.1-9.7 0-9.5-5.1-18.3-13.4-22.9z" fill="#F8A600"/>
                                    </svg>
                                @else
                                    <i class="{{ $method['icon'] }} text-2xl mr-3"></i> <!-- Use Font Awesome icons -->
                                @endif
                                <span class="text-xl font-medium">{{ $method['name'] }}</span>
                            </span>
                        </label>
                    @endforeach
                </div> 

                <div class="mt-6 text-center">
                    <!-- Ensure $payment is correctly referenced -->
                    @if($selectpayments->count() > 0)
                        @foreach($selectpayments as $payment)
                            @if($payment->room_id == $room->id)
                                <input type="hidden" name="selectpayments_id" value="{{ $payment->id }}">
                            @endif
                        @endforeach
                    @endif

                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200 ease-in-out transform hover:scale-105">
                        Continue
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
