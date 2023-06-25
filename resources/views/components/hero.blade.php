<x-guess-header />

<section class="text-gray-600 body-font bg-gradient-to-tr from-sbdlight to-white">
    <div class="container mx-auto flex  md:flex-row flex-col items-center px-5 md:px-22 lg:px-28 py-24 pb-52 pb-5">
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
            <img data-aos="fade-right" data-aos-duration="2000" data-aos-delay="300"
                class="object-cover object-center rounded" alt="hero" src="{{ asset('images/hero.png') }}">
        </div>
        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center space-y-8">
            <h1 data-aos="fade-left" data-aos-duration="2000" data-aos-delay="400"
                class="title-font font-sans text-5xl font-semibold text-gray-900">Unlock the
                extraordinary here at Fif'tea-8

            </h1>
            <p data-aos="fade-left" data-aos-duration="2000" data-aos-delay="400"
                class="font-sans  leading-relaxed text-lg">From classic favorites to
                innovative creations, our menu offers a tantalizing selection of premium teas, carefully sourced
                ingredients, and customizable options to suit your unique preferences.</p>
            <div class="flex items-center">
                <a href="{{ route('products') }}" data-aos="fade-left" data-aos-duration="2000" data-aos-delay="500"
                    class="font-sans text-sm text-white font-medium text-base bg-sbgreen hover:bg-green-800 py-2 px-4 rounded cursor-pointer">Order
                    Now</a>
                <a href="/user/cart" data-aos="fade-left" data-aos-duration="2000" data-aos-delay="500"
                    class="font-sans text-sm ml-4 text-gray-700 bg-gray-100  py-2 px-4 hover:bg-gray-200 rounded cursor-pointer hover:text-sbgreen">Your
                    Cart</a>
            </div>

            <div class="flex items-center space-x-4 " data-aos="fade-left" data-aos-duration="2000"
                data-aos-delay="600">
                <a href="">
                    <i
                        class='bx bxl-facebook-circle text-2xl text-sbgreen hover:text-white hover:transform hover:scale-110 transition duration-300 ease-in-out'></i>
                </a>
                <a href="">
                    <i
                        class='bx bxl-instagram-alt text-2xl text-sbgreen hover:text-white hover:transform hover:scale-110 transition duration-300 ease-in-out'></i>
                </a>
                <a href="">
                    <i
                        class='bx bxl-tiktok text-2xl text-sbgreen hover:text-white hover:transform hover:scale-110 transition duration-300 ease-in-out'></i>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="text-gray-600 body-font -mt-48 mb-10">
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
</section>
