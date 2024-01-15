@php
    use App\Enums\OrderStatus;
@endphp

<x-app-layout>

    <x-user-header />

    <section class="bg-gray-100 h-auto min-h-screen text-gray-700">
        <div class="max-w-[1300px] mx-auto px-4 pt-24 pb-4">
            <div class="w-full flex items-start justify-center space-x-6">
                <div class="w-full md:w-1/3 flex flex-col">
                    {{-- <div class="pb-4">
                        <a class="rounded bg-white border border-gray-200  hover:bg-gray-200 px-4 py-1 flex items-center w-fit text-gray-700 text-sm">
                            <i class='bx bx-left-arrow-alt text-2xl mr-2'></i>
                            back
                        </a>
                    </div> --}}

                    <h1 class="text-2xl font-bold ">
                        Send Stars and Feedback
                    </h1>

                    <form action="{{ route('client.feedbacks.store') }}" method="post" class="flex flex-col gap-2 w-full" x-data="starRating">
                        @csrf
                        <div class="flex space-x-0 bg-gray-100">

                            <template x-for="(star, index) in ratings" :key="index">
                                <button @click.prevent="rate(star.amount)" @mouseover="hoverRating = star.amount"
                                    @mouseleave="hoverRating = rating" aria-hidden="true" :title="star.label"
                                    class="rounded-sm text-gray-400 fill-current focus:outline-none focus:shadow-outline p-1 w-12 m-0 cursor-pointer"
                                    :class="{
                                        'text-gray-600': hoverRating >= star.amount,
                                        'text-yellow-400': rating >= star
                                            .amount && hoverRating >= star.amount
                                    }">
                                    <svg class="w-15 transition duration-150" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </button>

                            </template>

                        </div>
                        <div class="p-2">
                            <template x-if="rating || hoverRating">
                                <p x-text="currentLabel()"></p>
                            </template>
                            <template x-if="!rating && !hoverRating">
                                <p>Please Rate!</p>
                            </template>
                        </div>

                        {{-- <div class="py-4">
                            <div class="rating rating-lg flex items-center justify-between">
                                <input type="radio" name="rating-9" class="mask mask-star-2 bg-yellow-400" />
                                <input type="radio" name="rating-9" class="mask mask-star-2 bg-yellow-400" />
                                <input type="radio" name="rating-9" class="mask mask-star-2 bg-yellow-400" />
                                <input type="radio" name="rating-9" class="mask mask-star-2 bg-yellow-400" />
                                <input type="radio" name="rating-9" class="mask mask-star-2 bg-yellow-400" />
                              </div>
                        </div> --}}
                        <input type="hidden" x-model="rating" name="rate">
                        <input type="hidden" value="{{request()->cart}}" name="cart_id">
                        <div class="flex flex-col gap-2">
                            <label for="" class=" text-gray-700">Type your message here</label>
                            <textarea class="rounded w-full min-h-32 h-auto border border-gray-300 resize-none" name="message" placeholder="message" >
                            </textarea>
                        </div>
                        <button class="w-fit mt-2 px-6 py-2 rounded bg-blue-700 text-white flex items-center">
                            <i class='bx bx-send mr-2 text-base'></i>
                            Send
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
