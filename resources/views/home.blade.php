@extends('layouts.app')

@section('title')
Cloths-Shop
@endsection

@section('content')
<section id="home" class="max-w-[1200px] m-auto pt-[20px] px-[20px]">
    <div class="container flex h-full m-auto flex-wrap">
        <div class="left-side flex-1/2 flex flex-col justify-center md:text-left gap-[20px] text-center">
            <h1 class="heading text-6xl font-bold">Find Clothes that matches your style.</h1>
            <p>Browse through our diverse range of meticulously crafted garments, designed to bring out your individuality and cater to your sense of style.</p>
            <div>
                <a href="/clothes">
                    <button class="btn cursor-pointer bg-black px-[20px] py-[5px] text-white rounded-3xl">Shop Now</button>
                </a>
            </div>
            <div class="flex gap-[20px] mt-[10px]">
                <div>
                    <h2 class="text-3xl">200+</h2>
                    <span>International Brands</span>
                </div>
                 <div class="border-l-1 border-r-1 px-[10px]">
                    <h2 class="text-3xl">2,000+</h2>
                    <span>High-Quality Products</span>
                </div>
                 <div>
                    <h2 class="text-3xl">30,000+</h2>
                    <span>Happy Customers</span>
                </div>
            </div>
        </div>
        <div class="right-side flex-1/2 h-full">
            <img class="w-[800px]" src="{{asset('assets/images/home-img.png')}}" alt="Ladies fashion">
        </div>
    </div>
</section>
<div class="devider w-full bg-black flex items-center h-[100px]">
    <div class="w-[1200px] m-auto flex items-center">
        <div class="flex items-center"><img class="h-full" src="{{asset('assets/images/versace-logo.png')}}" alt=""></div>
        <div class="flex items-center"><img class="h-full" src="{{asset('assets/images/guccii.png')}}" alt=""></div>
        <div class="flex items-center"><img class="h-full" src="{{asset('assets/images/zara.png')}}" alt=""></div>
        <div class="flex items-center"><img class="h-full" src="{{asset('assets/images/prada.png')}}" alt=""></div>
        <div class="flex items-center"><img class="h-full" src="{{asset('assets/images/calvin-klein.png')}}" alt=""></div>
    </div>
</div>
<section id="new-arrivals" class="max-w-[1200px] m-auto pt-[20px] my-[60px]">
    <div class="container m-auto">
        <div class="heading">
            <h1 class="font-bold text-center text-4xl">
                NEW ARRIVALS
            </h1>
        </div>
        <div class="cards flex justify-between w-full gap-[20px] mt-[50px]">
           <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
      @foreach($clothes_latest as $clothe)
        <x-card :clothe="$clothe" :favoriteProductIds="$favoriteProductIds"/>
      @endforeach
  </div>

        </div>
    </div>
    <div class="flex justify-center mt-2">
        <a href="/clothes">
            <button class="border-1 py-[10px] px-[50px] rounded-3xl">View All</button>
        </a>
    </div>
</section>

<hr class="w-[80%] m-auto text-gray-500">

<section  id="top-selling" class="max-w-[1200px] m-auto pt-[20px] my-[60px]">
    <div class="container  m-auto">
        <div class="heading">
            <h1 class="font-bold text-center text-4xl">
                TOP SELLING
            </h1>
        </div>
        <div class="cards flex justify-between w-full gap-[20px] mt-[50px]">
            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">

      @foreach($clothes as $clothe)
        <x-card :clothe="$clothe" :favoriteProductIds="$favoriteProductIds"/>
      @endforeach
  </div>
    </div>
    <div class="flex justify-center mt-2">
        <a href="/clothes">
            <button class="border-1 py-[10px] px-[50px] rounded-3xl">View All</button>
        </a>
    </div>
</section>
<section class="max-w-[1200px] mx-auto mt-[60px] p-4 py-20">
    <div class="w-full max-w-7xl mx-auto">
      <div class="pb-8 flex justify-between items-center gap-8">
        <h2 class="text-4xl lg:text-5xl pb-4">
          Our collections
        </h2>
        <div class="hidden md:flex gap-6 text-2xl">
        </div>
      </div>

      <div class="flex gap-4">
        <a href="" class="w-full flex flex-col gap-2">
          <div class="max-h-[300px] md:max-h-[500px] overflow-hidden rounded-xl shadow-xl relative">
            
            <img class="w-full"
              src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8ZmFzaGlvbnxlbnwwfHwwfHx8MA%3D%3D"
              alt="">
          </div>
          <h3 class="text-2xl pt-4">New collection</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. et dolor y etlerim dolor gils de nada!
          </p>
        </a>
        <a href="" class="w-full flex flex-col gap-2">
          <div class="max-h-[300px] md:max-h-[500px] overflow-hidden rounded-xl shadow-xl relative">
            <img class="w-full"
              src="https://images.unsplash.com/photo-1529139574466-a303027c1d8b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8ZmFzaGlvbnxlbnwwfHwwfHx8MA%3D%3D"
              alt="">
          </div>
          <h3 class="text-2xl pt-4">Sales</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. et dolor y etlerim dolor gils de nada!
          </p>
        </a>
        <a href="" class="w-full hidden md:flex flex-col gap-2">
          <div class="max-h-[300px] md:max-h-[500px] overflow-hidden rounded-xl shadow-xl relative">
            
            <img class="w-full"
              src="https://images.unsplash.com/photo-1485968579580-b6d095142e6e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzF8fGZhc2hpb258ZW58MHx8MHx8fDA%3D"
              alt="">
          </div>
          <h3 class="text-2xl pt-4">Classics</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. et dolor y etlerim dolor gils de nada!
          </p>
        </a>
      </div>
    </div>
</section>
<section id="testimonial" class="max-w-[1200px] m-auto pt-[20px] my-[60px] mt-[40px]">
        <!-- Section Header -->
        <div class="mb-12 text-center">
            <h2 class="mb-4 text-3xl font-bold sm:text-4xl">
                What Users Are Saying
            </h2>
            <p class="max-w-2xl mx-auto text-lg text-gray-600">
                Hear from tools that have successfully listed on our platform
            </p>
        </div>

        <!-- Testimonial Cards Grid -->
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Testimonial 1 -->
            <div class="p-6 bg-white rounded-lg shadow-md transition-transform hover:shadow-lg hover:-translate-y-1">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 mr-4">
                        <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/women/6.jpg" alt="Profile image" />
                    </div>
                    <div>
                        <h3 class="font-bold">SynthGen AI</h3>
                        <p class="text-sm text-gray-500">@synthgenai</p>
                    </div>
                    <div class="ml-auto">
                        <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                            </path>
                        </svg>
                    </div>
                </div>
                <p class="text-gray-700">Listing on EliteAI.tools gave us a 40% boost in signups! The quality of traffic
                    is incredible - these are users who are actually looking for AI solutions. Worth every penny!</p>
                <div class="flex items-center mt-4 text-gray-500">
                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z">
                        </path>
                    </svg>
                    <span class="mr-4">143</span>
                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23 3c-6.62-.1-10.38 2.421-13.05 6.03C7.29 12.61 6 17.331 6 22h2c0-1.007.07-2.012.19-3H12c4.1 0 7.48-3.082 7.94-7.054C22.79 10.147 23.17 6.359 23 3zm-7 8h-1.5v2H16c.63-.016 1.2-.08 1.72-.188C16.95 15.24 14.68 17 12 17H8.55c.57-2.512 1.57-4.851 3-6.78 2.16-2.912 5.29-4.911 9.45-5.187C20.95 8.079 19.9 11 16 11zM4 9V6H1V4h3V1h2v3h3v2H6v3H4z">
                        </path>
                    </svg>
                    <span class="mr-4">24</span>
                    <span class="text-sm">3:42 PM · Feb 12, 2025</span>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="p-6 bg-white rounded-lg shadow-md transition-transform hover:shadow-lg hover:-translate-y-1">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 mr-4">
                        <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/men/24.jpg" alt="Profile image" />
                    </div>
                    <div>
                        <h3 class="font-bold">NeuralScribe</h3>
                        <p class="text-sm text-gray-500">@neuralscribe</p>
                    </div>
                    <div class="ml-auto">
                        <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                            </path>
                        </svg>
                    </div>
                </div>
                <p class="text-gray-700">Fast-tracking our listing was the best marketing decision we made. Went from
                    zero to 500+ daily users in just two weeks! EliteAI.tools put us in front of the perfect audience.
                </p>
                <div class="flex items-center mt-4 text-gray-500">
                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z">
                        </path>
                    </svg>
                    <span class="mr-4">217</span>
                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23 3c-6.62-.1-10.38 2.421-13.05 6.03C7.29 12.61 6 17.331 6 22h2c0-1.007.07-2.012.19-3H12c4.1 0 7.48-3.082 7.94-7.054C22.79 10.147 23.17 6.359 23 3zm-7 8h-1.5v2H16c.63-.016 1.2-.08 1.72-.188C16.95 15.24 14.68 17 12 17H8.55c.57-2.512 1.57-4.851 3-6.78 2.16-2.912 5.29-4.911 9.45-5.187C20.95 8.079 19.9 11 16 11zM4 9V6H1V4h3V1h2v3h3v2H6v3H4z">
                        </path>
                    </svg>
                    <span class="mr-4">53</span>
                    <span class="text-sm">11:28 AM · Jan 29, 2025</span>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="p-6 bg-white rounded-lg shadow-md transition-transform hover:shadow-lg hover:-translate-y-1">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 mr-4">
                        <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/men/54.jpg" alt="Profile image" />
                    </div>
                    <div>
                        <h3 class="font-bold">QuantumWrite</h3>
                        <p class="text-sm text-gray-500">@quantumwriteai</p>
                    </div>
                    <div class="ml-auto">
                        <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                            </path>
                        </svg>
                    </div>
                </div>
                <p class="text-gray-700">As a bootstrapped startup, we needed cost-effective promotion. The Boosted plan
                    delivered incredible ROI - our demo requests increased 3x in the first month alone. Highly
                    recommend!</p>
                <div class="flex items-center mt-4 text-gray-500">
                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z">
                        </path>
                    </svg>
                    <span class="mr-4">189</span>
                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23 3c-6.62-.1-10.38 2.421-13.05 6.03C7.29 12.61 6 17.331 6 22h2c0-1.007.07-2.012.19-3H12c4.1 0 7.48-3.082 7.94-7.054C22.79 10.147 23.17 6.359 23 3zm-7 8h-1.5v2H16c.63-.016 1.2-.08 1.72-.188C16.95 15.24 14.68 17 12 17H8.55c.57-2.512 1.57-4.851 3-6.78 2.16-2.912 5.29-4.911 9.45-5.187C20.95 8.079 19.9 11 16 11zM4 9V6H1V4h3V1h2v3h3v2H6v3H4z">
                        </path>
                    </svg>
                    <span class="mr-4">42</span>
                    <span class="text-sm">4:15 PM · Feb 3, 2025</span>
                </div>
            </div>

            <!-- Testimonial 4 -->
            <div class="p-6 bg-white rounded-lg shadow-md transition-transform hover:shadow-lg hover:-translate-y-1">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 mr-4">
                        <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/women/53.jpg" alt="Profile image" />
                    </div>
                    <div>
                        <h3 class="font-bold">VoiceGenius</h3>
                        <p class="text-sm text-gray-500">@voicegeniusai</p>
                    </div>
                    <div class="ml-auto">
                        <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                            </path>
                        </svg>
                    </div>
                </div>
                <p class="text-gray-700">The SEO boost from being listed on EliteAI.tools is incredible. We've climbed
                    to the first page for several key search terms. The quality of traffic converts at nearly 2x our
                    other channels.</p>
                <div class="flex items-center mt-4 text-gray-500">
                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z">
                        </path>
                    </svg>
                    <span class="mr-4">167</span>
                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23 3c-6.62-.1-10.38 2.421-13.05 6.03C7.29 12.61 6 17.331 6 22h2c0-1.007.07-2.012.19-3H12c4.1 0 7.48-3.082 7.94-7.054C22.79 10.147 23.17 6.359 23 3zm-7 8h-1.5v2H16c.63-.016 1.2-.08 1.72-.188C16.95 15.24 14.68 17 12 17H8.55c.57-2.512 1.57-4.851 3-6.78 2.16-2.912 5.29-4.911 9.45-5.187C20.95 8.079 19.9 11 16 11zM4 9V6H1V4h3V1h2v3h3v2H6v3H4z">
                        </path>
                    </svg>
                    <span class="mr-4">36</span>
                    <span class="text-sm">2:10 PM · Jan 18, 2025</span>
                </div>
            </div>

            <!-- Testimonial 5 -->
            <div class="p-6 bg-white rounded-lg shadow-md transition-transform hover:shadow-lg hover:-translate-y-1">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 mr-4">
                        <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/women/43.jpg" alt="Profile image" />
                    </div>
                    <div>
                        <h3 class="font-bold">DataSage</h3>
                        <p class="text-sm text-gray-500">@datasageai</p>
                    </div>
                    <div class="ml-auto">
                        <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                            </path>
                        </svg>
                    </div>
                </div>
                <p class="text-gray-700">We tried several directories but EliteAI.tools stands out. The curation process
                    means you're alongside other quality tools, which gives users confidence. Our conversions are up 35%
                    from this traffic!</p>
                <div class="flex items-center mt-4 text-gray-500">
                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z">
                        </path>
                    </svg>
                    <span class="mr-4">201</span>
                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23 3c-6.62-.1-10.38 2.421-13.05 6.03C7.29 12.61 6 17.331 6 22h2c0-1.007.07-2.012.19-3H12c4.1 0 7.48-3.082 7.94-7.054C22.79 10.147 23.17 6.359 23 3zm-7 8h-1.5v2H16c.63-.016 1.2-.08 1.72-.188C16.95 15.24 14.68 17 12 17H8.55c.57-2.512 1.57-4.851 3-6.78 2.16-2.912 5.29-4.911 9.45-5.187C20.95 8.079 19.9 11 16 11zM4 9V6H1V4h3V1h2v3h3v2H6v3H4z">
                        </path>
                    </svg>
                    <span class="mr-4">47</span>
                    <span class="text-sm">10:23 AM · Feb 8, 2025</span>
                </div>
            </div>

            <!-- Testimonial 6 -->
            <div class="p-6 bg-white rounded-lg shadow-md transition-transform hover:shadow-lg hover:-translate-y-1">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 mr-4">
                        <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/men/62.jpg" alt="Profile image" />
                    </div>
                    <div>
                        <h3 class="font-bold">CopyMuse</h3>
                        <p class="text-sm text-gray-500">@copymuseai</p>
                    </div>
                    <div class="ml-auto">
                        <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                            </path>
                        </svg>
                    </div>
                </div>
                <p class="text-gray-700">Investors actually mentioned seeing us on EliteAI.tools during our seed round!
                    The directory has become a go-to resource for the industry. Still getting consistent traffic 6
                    months after listing.</p>
                <div class="flex items-center mt-4 text-gray-500">
                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z">
                        </path>
                    </svg>
                    <span class="mr-4">175</span>
                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23 3c-6.62-.1-10.38 2.421-13.05 6.03C7.29 12.61 6 17.331 6 22h2c0-1.007.07-2.012.19-3H12c4.1 0 7.48-3.082 7.94-7.054C22.79 10.147 23.17 6.359 23 3zm-7 8h-1.5v2H16c.63-.016 1.2-.08 1.72-.188C16.95 15.24 14.68 17 12 17H8.55c.57-2.512 1.57-4.851 3-6.78 2.16-2.912 5.29-4.911 9.45-5.187C20.95 8.079 19.9 11 16 11zM4 9V6H1V4h3V1h2v3h3v2H6v3H4z">
                        </path>
                    </svg>
                    <span class="mr-4">31</span>
                    <span class="text-sm">1:35 PM · Jan 22, 2025</span>
                </div>
            </div>

        </div>
    </div>
</div>
    </div>
</section>

<section id="contact">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mb-4">
            <div class="mb-6 max-w-3xl text-center sm:text-center md:mx-auto md:mb-12">
                <h2
                    class="font-heading mb-4 font-bold tracking-tight text-gray-900 text-3xl sm:text-5xl">
                    Get in Touch
                </h2>
            </div>
        </div>
        <div class="flex items-stretch justify-center">
            <div class="grid md:grid-cols-2">
                <div class="h-full pr-6">
                    <p class="mt-3 mb-12 text-lg text-gray-600 ">
                        Need help, have a question, or want to explore our services? We're here to assist you! You can reach us by phone at email, or by completing the form below. Our team is dedicated to providing excellent support and we're always happy to help. Learn more about our company and services by exploring our website.
                    </p>
                    <ul class="mb-6 md:mb-0">
                        <li class="flex">
                            <div class="flex h-10 w-10 items-center justify-center rounded bg-blue-900 text-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="h-6 w-6">
                                    <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                    <path
                                        d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4 mb-4">
                                <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900 ">Our Address
                                </h3>
                                <p class="text-gray-600 ">St 256, Phnom Penh</p>
                                <p class="text-gray-600 ">Cambodia, KH</p>
                            </div>
                        </li>
                        <li class="flex">
                            <div class="flex h-10 w-10 items-center justify-center rounded bg-blue-900 text-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="h-6 w-6">
                                    <path
                                        d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                    </path>
                                    <path d="M15 7a2 2 0 0 1 2 2"></path>
                                    <path d="M15 3a6 6 0 0 1 6 6"></path>
                                </svg>
                            </div>
                            <div class="ml-4 mb-4">
                                <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900 ">Contact
                                </h3>
                                <p class="text-gray-600 ">Mobile: +1 (123) 456-7890</p>
                                <p class="text-gray-600 ">Mail: test@gmail.com</p>
                            </div>
                        </li>
                        <li class="flex">
                            <div class="flex h-10 w-10 items-center justify-center rounded bg-blue-900 text-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="h-6 w-6">
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                    <path d="M12 7v5l3 3"></path>
                                </svg>
                            </div>
                            <div class="ml-4 mb-4">
                                <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900 ">Working
                                    hours</h3>
                                <p class="text-gray-600 ">Monday - Friday: 08:00 - 17:00</p>
                                <p class="text-gray-600 ">Saturday &amp; Sunday: 08:00 - 12:00</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card h-fit max-w-6xl p-5 md:p-12" id="form">
                    <h2 class="mb-4 text-2xl font-bold ">Ready to Get Started?</h2>
                    <form id="contactForm">
                        <div class="mb-6">
                            <div class="mx-0 mb-1 sm:mb-4">
                                <div class="mx-0 mb-1 sm:mb-4">
                                    <label for="name" class="pb-1 text-xs uppercase tracking-wider"></label><input type="text" id="name" autocomplete="given-name" placeholder="Your name" class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md sm:mb-0" name="name">
                                </div>
                                <div class="mx-0 mb-1 sm:mb-4">
                                    <label for="email" class="pb-1 text-xs uppercase tracking-wider"></label><input type="email" id="email" autocomplete="email" placeholder="Your email address" class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md sm:mb-0" name="email">
                                </div>
                            </div>
                            <div class="mx-0 mb-1 sm:mb-4">
                                <label for="textarea" class="pb-1 text-xs uppercase tracking-wider"></label><textarea id="textarea" name="textarea" cols="30" rows="5" placeholder="Write your message..." class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md sm:mb-0"></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="w-full bg-blue-800 text-white px-6 py-3 font-xl rounded-md sm:mb-0">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection