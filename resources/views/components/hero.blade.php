<x-guess-header />

<section class="text-gray-600 body-font py-12 md:py-0"> {{-- bg-gradient-to-tr from-sbdlight to-white --}}
    <div class="md:h-[700px] w-full max-w-[1300px] mx-auto flex flex-col md:flex-row items-center px-4 pt-[40px]">

        <div class="w-full md:w-2/5 flex flex-col space-y-5 justify-start items-center md:items-start">
            <h2 data-aos="fade-right" data-aos-duration="2000" data-aos-delay="200"
                class="font-sans text-2xl font-semibold text-yellow-700">
                Experience
            </h2>

            <h1 data-aos="fade-right" data-aos-duration="2000" data-aos-delay="300"
                class="dancing-script text-7xl text-sbgreen">Fif'tea-8
            </h1>
            <p data-aos="fade-left" data-aos-duration="2000" data-aos-delay="400"
                class="font-sans  leading-relaxed text-lg text-center md:text-left"> {{ $content->description ?? '' }}
            </p>
            <div class="flex items-center">
                <a href="{{ route('products') }}" data-aos="fade-left" data-aos-duration="2000" data-aos-delay="500"
                    class="font-sans text-white font-medium text-base bg-sbgreen hover:bg-green-800 border border-sbgreen py-2 px-4 cursor-pointer transition-all ease-in-out delay-150">Order
                    Now</a>
            </div>

            <a href="https://facebook.com"
                class="flex items-center space-x-4 py-2 px-4 border border-gray-300 hover:border-blue-700 rounded-md"
                data-aos="fade-right" data-aos-duration="2000" data-aos-delay="600">
                <span class="text-base text-blue-700">Follow us on</span>
                <div class="">
                    <i class='bx bxl-facebook-circle text-2xl text-blue-700'></i>
                </div>
            </a>
        </div>

        <div class="w-full md:w-3/5 h-full hidden md:block">
            <div class="w-full h-full flex items-center justify-end space-x-2">

                {{-- @if ($content->leftImage && $content->centerImage && $content->rightImage) --}}
                    <div class="hover:transform hover:scale-105 transition duration-300 ease-in-out">
                        <img data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300"
                            class="w-[200px] h-[350px] object-contain object-center shadow-md bg-white rounded p-6"
                            alt="hero" src="{{ asset('storage/' . $content->leftImage) }}">
                    </div>

                    <div class="hover:transform hover:scale-105 transition duration-300 ease-in-out">
                        <img data-aos="fade-down" data-aos-duration="2000" data-aos-delay="400"
                            class="w-[250px] h-[450px] object-contain object-center shadow-md bg-white rounded"
                            alt="hero" src="{{ asset('storage/' . $content->centerImage) }}">
                    </div>

                    <div class="hover:transform hover:scale-105 transition duration-300 ease-in-out">
                        <img data-aos="fade-up" data-aos-duration="2000" data-aos-delay="500"
                            class="w-[200px] h-[350px] object-contain object-center shadow-md bg-white rounded"
                            alt="hero" src="{{ asset('storage/' . $content->rightImage) }}">
                    </div>
                {{-- @else --}}
                    {{-- <div class="hover:transform hover:scale-105 transition duration-300 ease-in-out">
                        <img data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300"
                            class="w-[200px] h-[350px] object-contain object-center shadow-md bg-white rounded p-6"
                            alt="hero" src="{{ asset('images/choco/Buko Pandan.png') }}">
                    </div>

                    <div class="hover:transform hover:scale-105 transition duration-300 ease-in-out">
                        <img data-aos="fade-down" data-aos-duration="2000" data-aos-delay="400"
                            class="w-[250px] h-[450px] object-contain object-center shadow-md bg-white rounded"
                            alt="hero" src="{{ asset('images/choco/Cheesy Mango.png') }}">
                    </div>

                    <div class="hover:transform hover:scale-105 transition duration-300 ease-in-out">
                        <img data-aos="fade-up" data-aos-duration="2000" data-aos-delay="500"
                            class="w-[200px] h-[350px] object-contain object-center shadow-md bg-white rounded"
                            alt="hero" src="{{ asset('images/choco/Choco Hazelnut.png') }}">
                    </div> --}}
                {{-- @endif --}}
            </div>
        </div>
    </div>
</section>
