<x-guess-header />

<section class="text-gray-600 body-font ">  {{--bg-gradient-to-tr from-sbdlight to-white--}}
    <div class="h-[700px] max-w-[1300px] mx-auto flex items-center px-4 pt-[90px]">
       
        <div class="w-2/5 flex flex-col space-y-4 justify-start">
            <h2 data-aos="fade-right" data-aos-duration="2000" data-aos-delay="200"
                class="font-sans text-3xl font-semibold text-sbgreen">
                Experience
            </h2>

            <h1 data-aos="fade-right" data-aos-duration="2000" data-aos-delay="300"
                class=" font-sans text-7xl font-semibold text-black">Fif'tea-8
            </h1>

            <p data-aos="fade-right" data-aos-duration="2000" data-aos-delay="400"
                class="font-sans  leading-relaxed text-xl">Offers a tantalizing selection of premium teas, carefully sourced
                ingredients, and customizable options to suit your unique preferences.
            </p>

            <div class="flex items-center pt-3">
                <a href="{{ route('products') }}" data-aos="fade-right" data-aos-duration="2000" data-aos-delay="500"
                    class="font-sans text-lg text-white font-medium bg-sbgreen hover:bg-green-800 py-2 px-4 cursor-pointer">
                    Order Now
                </a>
            </div>

            <div class="flex items-center space-x-4 " data-aos="fade-right" data-aos-duration="2000"
                data-aos-delay="600">
                <a href="" class="p-2 px-3 bg-gray-200 rounded-full hover:bg-black">
                    <i class='bx bxl-facebook-circle text-2xl text-blue-700 hover:text-white hover:transform hover:scale-110 transition duration-300 ease-in-out'></i>
                </a>
                <a href=""  class="p-2 px-3 bg-gray-200 rounded-full hover:bg-black">
                    <i class='bx bxl-instagram-alt text-2xl text-red-500 hover:text-white hover:transform hover:scale-110 transition duration-300 ease-in-out'></i>
                </a>
                <a href=""  class="p-2 px-3 bg-gray-200 rounded-full hover:bg-black">
                    <i class='bx bxl-tiktok text-2xl text-black hover:text-white hover:transform hover:scale-110 transition duration-300 ease-in-out'></i>
                </a>
            </div>
        </div>

        <div class="w-3/5 h-full ">
            <div class="w-full h-full flex items-center justify-center space-x-2">
                <div class="hover:transform hover:scale-105 transition duration-300 ease-in-out">
                    <img data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300"
                    class="w-[180px] h-[380px] object-cover object-center shadow-md bg-white rounded" 
                    alt="hero" src="{{ asset('images/girl.jpg') }}">
                </div>

                <div class="hover:transform hover:scale-105 transition duration-300 ease-in-out">
                    <img data-aos="fade-down" data-aos-duration="2000" data-aos-delay="400"
                    class="w-[250px] h-[450px] object-cover object-center shadow-md bg-white rounded" 
                    alt="hero" src="{{ asset('images/single.jpg') }}">
                </div>

                <div class="hover:transform hover:scale-105 transition duration-300 ease-in-out">
                    <img data-aos="fade-up" data-aos-duration="2000" data-aos-delay="500"
                    class="w-[180px] h-[380px] object-cover object-center shadow-md bg-white rounded" 
                    alt="hero" src="{{ asset('images/with-hand.jpg') }}">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <section class="text-gray-600 body-font -mt-48 mb-10">
    <div class="container px-5 md:px-22 lg:px-28 py-10 mx-auto">
        <div class="flex items-center justify-center -m-4">
            <div class=" flex space-x-2">

                <div class="p-4 lg:w-1/3 hover:transform hover:scale-105 transition duration-500 ease-in-out">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow bg-white">
                        <div class="lg:h-80 md:h-60 w-full p-4">
                            <img class="h-full w-full" src="{{ asset('images/choco/Kiwi.png') }}" alt="blog">
                        </div>
                        
                        <div class="p-6 bg-gradient-to-tr from-sbdlight to-white">
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1 p-1 border border-gray-400 rounded w-fit">MILKTEA</h2>
                            <div class="flex flex-col items-start space-y-1 mb-2">
                                <h1 class="title-font text-xl font-medium text-sbgreen font-semibold">Kiwi</h1>
                                <div class="flex items-center space-x-2">
                                    <i class='bx bxs-star text-lg text-yellow-500'></i>
                                    <i class='bx bxs-star text-lg text-yellow-500'></i>
                                    <i class='bx bxs-star text-lg text-yellow-500'></i>
                                    <i class='bx bxs-star text-lg text-yellow-500'></i>
                                    <i class='bx bxs-star text-lg text-yellow-500'></i>
                                </div>
                            </div>
                            <p class="leading-relaxed mb-3">This Kiwi flavored milktea offers 
                                a smooth and satisfying experience with every sip.</p>
                            <div class="w-full flex justify-between items-center ">
                                <a href="{{ route('products') }}"
                                    class="text-white py-1 px-3 bg-sbgreen rounded inline-flex items-center md:mb-2 lg:mb-0">See More
                                </a>
                                
                                <span class="inline-flex items-center leading-none font-medium text-sbgreen text-base">PRICE: 70</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-4 lg:w-1/3 hover:transform hover:scale-105 transition duration-500 ease-in-out">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow bg-white">

                        <div class="lg:h-80 md:h-60 w-full p-4">
                            <img class="h-full w-full" src="{{ asset('images/choco/Hokkaido.png') }}" alt="blog">
                        </div>

                        <div class="p-6 bg-gradient-to-tr from-sbdlight to-white">
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1 p-1 border border-gray-400 rounded w-fit">MILKTEA</h2>
                            <div class="flex flex-col items-start space-y-1 mb-2">
                                <h1 class="title-font text-xl font-medium text-sbgreen font-semibold">Hokkaido</h1>
                                <div class="flex items-center space-x-2">
                                    <i class='bx bxs-star text-lg text-yellow-500'></i>
                                    <i class='bx bxs-star text-lg text-yellow-500'></i>
                                    <i class='bx bxs-star text-lg text-yellow-500'></i>
                                    <i class='bx bxs-star text-lg text-yellow-500'></i>
                                    <i class='bx bxs-star text-lg text-yellow-500'></i>
                                </div>
                            </div>
                            <p class="leading-relaxed mb-3">Hokkaido milktea definitely gives  
                                a smooth and satisfying experience with each sip.</p>
                            <div class="w-full flex justify-between items-center ">
                                <a href="{{ route('products') }}"
                                    class="text-white py-1 px-3 bg-sbgreen rounded inline-flex items-center md:mb-2 lg:mb-0">See More
                                </a>
                                
                                <span class="inline-flex items-center leading-none font-medium text-sbgreen text-base">PRICE: 70</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-4 lg:w-1/3 hover:transform hover:scale-105 transition duration-500 ease-in-out ">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow bg-white">

                        <div class="lg:h-80 md:h-60 w-full p-4">
                            <img class="h-full w-full"  src="{{ asset('images/choco/BlueBerry.png') }}" alt="blog">
                        </div>

                        <div class="p-6 bg-gradient-to-tr from-sbdlight to-white">
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1 p-1 border border-gray-400 rounded w-fit">MILKTEA</h2>
                            <div class="flex flex-col items-start space-y-1 mb-2">
                                <h1 class="title-font text-xl font-medium text-sbgreen font-semibold">Blueberry</h1>
                                <div class="flex items-center space-x-2">
                                    <i class='bx bxs-star text-lg text-yellow-500'></i>
                                    <i class='bx bxs-star text-lg text-yellow-500'></i>
                                    <i class='bx bxs-star text-lg text-yellow-500'></i>
                                    <i class='bx bxs-star text-lg text-yellow-500'></i>
                                    <i class='bx bxs-star text-lg text-yellow-500'></i>
                                </div>
                            </div>
                            <p class="leading-relaxed mb-3">Quench your thirst with our refreshing Blueberry milk tea. 
                               </p>
                            <div class="w-full flex justify-between items-center ">
                                <a href="{{ route('products') }}"
                                    class="text-white py-1 px-3 bg-sbgreen rounded inline-flex items-center md:mb-2 lg:mb-0">See More
                                </a>
                                
                                <span class="inline-flex items-center leading-none font-medium text-sbgreen text-base">PRICE: 70</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section> --}}
