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
                @foreach ($feedBacks as $feedback)
                    <div class='flex flex-col space-y-6 w-full md:w-80 rounded-lg border border-gray-300 p-6 bg-white shadow-md hover:transform hover:scale-105 transition duration-300 ease-in-out'
                        data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class='flex items-center space-x-3'>
                                @if ($feedback->user->profile?->image)
                                    <img src="{{ asset('storage/' . $feedback->user->profile->image) }}"
                                        class="w-10 h-10" />
                                @else
                                    @if ($feedback->user->profile?->sex == 'Male')
                                        <img id="db-cover-photo"
                                        src="{{asset('images/male.png')}}" alt="Image"
                                        class="w-10 h-10 rounded-full object-cover object-center bg-white" />
                                    @else
                                        <img id="db-cover-photo"
                                        src="{{asset('images/female.png')}}" alt="Image"
                                        class="w-10 h-10 rounded-full object-cover object-center bg-white" />
                                    @endif
                                @endif
                                <p class='monument text-lg font-bold text-yellow-700'>{{ $feedback->user->name }}
                                </p>
                                {{-- <p class='font-medium text-[12px]'>Student</p> --}}
                            </div>
                        </div>

                        <div class="flex items-center">
                            @for ($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 {{ $feedback->rate >= $i ? 'text-yellow-300' : ' ' }} ms-1"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                            @endfor
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
