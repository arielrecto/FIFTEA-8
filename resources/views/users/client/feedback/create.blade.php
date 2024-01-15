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

                    <form action="{{ route('client.feedbacks.store') }}" method="post" class="flex flex-col gap-2 w-full">
                        @csrf
                        <div class="py-4">
                            <div class="rating rating-lg flex items-center justify-between">
                                <input type="radio" name="rating-9" class="mask mask-star-2 bg-yellow-400" />
                                <input type="radio" name="rating-9" class="mask mask-star-2 bg-yellow-400" />
                                <input type="radio" name="rating-9" class="mask mask-star-2 bg-yellow-400" />
                                <input type="radio" name="rating-9" class="mask mask-star-2 bg-yellow-400" />
                                <input type="radio" name="rating-9" class="mask mask-star-2 bg-yellow-400" />
                              </div>
                        </div>
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
