@extends('layouts.user')
@section('content')

  <!-- Header -->
  <header class="bg-white shadow-sm">
    <div class="container mx-auto text-center py-12">
      <h1 class="text-5xl font-bold text-gray-800">About Us</h1>
      <p class="text-lg text-gray-500 mt-4">Get to know more about our journey and why we are your best choice for finding the perfect room.</p>
    </div>
  </header>

  <!-- About Us Content -->
  <section class="container mx-auto px-4 py-12">
    <div class="flex flex-wrap items-center mb-16">
      <!-- Mission Section -->
      <div class="about-text w-full lg:w-1/2 mb-8 lg:mb-0 px-4">
        <h2 class="text-3xl font-semibold text-cyan-500 mb-4">Our Mission</h2>
        <p class="text-lg text-gray-700 leading-relaxed mb-6">
          Our mission is to make travel seamless and personalized, one room at a time. We believe that where you stay shapes how you experience a destination. That's why we're dedicated to providing a diverse range of accommodations that suit every traveler's style, budget, and needs.
        </p>
        <h2 class="text-3xl font-semibold text-cyan-500 mb-4">Why Choose Us?</h2>
        <ul class="list-disc list-inside text-lg text-gray-700 space-y-3">
          <li><strong>Diverse Selection:</strong> From cozy apartments to luxurious villas, we offer a variety of options tailored to your preferences.</li>
          <li><strong>Ease of Use:</strong> Our platform is user-friendly and intuitive, making the booking process smooth and stress-free.</li>
          <li><strong>Trust and Safety:</strong> We rigorously vet every property and host to ensure your peace of mind during your stay.</li>
          <li><strong>Local Insights:</strong> Discover hidden gems and local tips from hosts who know the area intimately.</li>
          <li><strong>Exceptional Support:</strong> Our dedicated team is ready to assist you at every step, from browsing to booking.</li>
        </ul>
      </div>
      <!-- Image Section -->
      <div class="about-image w-full lg:w-1/2 px-4">
        <img src="img/png.png" alt="Our Mission Image" class="rounded-lg shadow-md w-full">
      </div>
    </div>

    <!-- Our Story Section -->
    <div class="mb-16">
      <h2 class="text-3xl font-semibold text-cyan-600 mb-4">Our Story</h2>
      <p class="text-lg text-gray-700 leading-relaxed mb-6">
        RoomKhoj was founded by Subash in [Year]. Driven by a passion for travel and a vision for a personalized accommodation experience, Subash created a platform that connects travelers with unique and welcoming spaces around the world.
      </p>
      <p class="text-lg text-gray-700 leading-relaxed mb-6">
        Since then, RoomKhoj has evolved into a thriving community of travelers and hosts, united by a love for exploration and hospitality. Our journey is shaped by the stories of every guest who finds comfort in our accommodations and every host who opens their doors to create unforgettable memories.
      </p>
    </div>

    <!-- Join Us Section -->
    <div class="join-us mb-16">
      <h2 class="text-3xl font-semibold text-cyan-600 mb-4">Join Us</h2>
      <p class="text-lg text-gray-700 leading-relaxed">
        Whether you're an avid traveler seeking your next adventure or a property owner looking to share your space, RoomKhoj welcomes you to our community. Experience travel like never before, one room at a time.
      </p>
    </div>

    <!-- Image Gallery Section -->
    <div class="images-container grid grid-cols-1 md:grid-cols-2 gap-6 mb-16">
      <img src="image1.jpg" alt="Our Team" class="rounded-lg shadow-lg">
      <img src="image2.jpg" alt="Our Mission" class="rounded-lg shadow-lg">
    </div>
  </section>

  <!-- Footer -->
  @endsection