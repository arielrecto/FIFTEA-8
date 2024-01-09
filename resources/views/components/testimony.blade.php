@props([
    'feedBacks' => [],
])

<section>
    <div class="max-w-[1300px] mx-auto px-4">
        <div class="flex flex-col space-y-14 py-20">
            <div class="w-full flex items-center justify-center text-center md:text-left">
                <p class="abril text-5xl ">What our <span class="text-sbgreen">Customers say</span> about us</p>
            </div>

            <div class="flex flex-col md:flex-row items-start md:space-x-4 justify-between space-y-4 md:space-y-0">

                {{-- @if (count($feedBacks) === 0) --}}
                    {{-- <div class='flex flex-col space-y-6 w-full md:w-80 rounded-lg border border-gray-300 p-6 bg-white shadow-md hover:transform hover:scale-105 transition duration-300 ease-in-out'
                        data-aos="fade-down" data-aos-duration="2000" data-aos-delay="100">
                        <div class='flex items-center space-x-3'>
                            <img alt="" class='w-14 h-14 rounded-full bg-gray-300' />
                            <div>
                                <p class='monument text-lg font-bold text-yellow-700'>John Delima</p>
                                <p class='font-medium text-[12px]'>Student</p>
                            </div>
                        </div>
                        <p class='font-medium text-sm text-gray-600 text-justify'>I absolutely love the milk tea from
                            this
                            shop! The flavors are so rich and authentic, and the boba pearls are always perfectly chewy.
                            It's become my go-to spot for a delicious and refreshing treat.</p>
                    </div>

                    <div class='flex flex-col space-y-6 w-full md:w-80 rounded-lg border border-gray-300 p-6 bg-white shadow-md hover:transform hover:scale-105 transition duration-300 ease-in-out'
                        data-aos="fade-up" data-aos-duration="2000" data-aos-delay="200">
                        <div class='flex items-center space-x-3'>
                            <img alt="" class='w-14 h-14 rounded-full bg-gray-300' />
                            <div>
                                <p class='monument text-lg font-bold text-yellow-700'>Shan Delima</p>
                                <p class='font-medium text-[12px]'>Student</p>
                            </div>
                        </div>
                        <p class='font-medium text-sm text-gray-600 text-justify'>I absolutely love the milk tea from
                            this
                            shop! The flavors are so rich and authentic, and the boba pearls are always perfectly chewy.
                            It's become my go-to spot for a delicious and refreshing treat.</p>
                    </div>

                    <div class='flex flex-col space-y-6 w-full md:w-80 rounded-lg border border-gray-300 p-6 bg-white shadow-md hover:transform hover:scale-105 transition duration-300 ease-in-out'
                        data-aos="fade-down" data-aos-duration="2000" data-aos-delay="300">
                        <div class='flex items-center space-x-3'>
                            <img alt="" class='w-14 h-14 rounded-full bg-gray-300' />
                            <div>
                                <p class='monument text-lg font-bold text-yellow-700'>Gian Navara</p>
                                <p class='font-medium text-[12px]'>Student</p>
                            </div>
                        </div>
                        <p class='font-medium text-sm text-gray-600 text-justify'>The White Caramel Milk Tea is my new
                            addiction! The balance of creaminess and sweetness is spot on, and the presentation is
                            always
                            Instagram-worthy. Friendly staff and a cozy atmosphere make it the perfect place to unwind.
                        </p>
                    </div>

                    <div class='flex flex-col space-y-6 w-full md:w-80 rounded-lg border border-gray-300 p-6 bg-white shadow-md hover:transform hover:scale-105 transition duration-300 ease-in-out'
                        data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class='flex items-center space-x-3'>
                            <img alt="" class='w-14 h-14 rounded-full bg-gray-300' />
                            <div>
                                <p class='monument text-lg font-bold text-yellow-700'>Rolly John</p>
                                <p class='font-medium text-[12px]'>Student</p>
                            </div>
                        </div>
                        <p class='font-medium text-sm text-gray-600 text-justify'>I've tried milk tea from various
                            places,
                            but this shop's quality is unmatched. The teas taste fresh, and you can tell they use
                            high-quality ingredients. I'm a loyal customer now, and I can't recommend them enough!</p>
                    </div>
                @else --}}
                    @foreach ($feedBacks as $feedback)
                        <div class='flex flex-col space-y-6 w-full md:w-80 rounded-lg border border-gray-300 p-6 bg-white shadow-md hover:transform hover:scale-105 transition duration-300 ease-in-out'
                            data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                            <div class='flex items-center space-x-3'>
                                <img alt="" class='w-14 h-14 rounded-full bg-gray-300' />
                                <div>
                                    <p class='monument text-lg font-bold text-yellow-700'>{{ $feedback->user->name }}
                                    </p>
                                    {{-- <p class='font-medium text-[12px]'>Student</p> --}}
                                </div>
                            </div>
                            <p class='font-medium text-sm text-gray-600 text-justify'>{{ $feedback->message }}
                            </p>
                        </div>
                    @endforeach
                    {{-- @endif --}}
            </div>
        </div>
    </div>
</section>
