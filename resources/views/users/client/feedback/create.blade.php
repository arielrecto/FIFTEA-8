@php
    use App\Enums\OrderStatus;
@endphp

<x-app-layout>

    <x-user-header />

    <section class="bg-gray-100">
        <div class="max-w-[1300px] mx-auto px-4 pt-24 pb-4">
            <div class="flex items-start justify-between space-x-6">
                <div class="w-full flex flex-col">

                    <h1 class="text-3xl font-bold tracking-widest">
                        Add Feedback
                    </h1>

                    <form action="{{ route('client.feedbacks.store') }}" method="post" class="flex flex-col gap-2 w-full">
                        @csrf
                        <div class="flex flex-col gap-2">
                            <label for="" class="text-sm text-gray-700">Message</label>
                            <textarea class="w-full textarea-accent" name="message" placeholder="message">

                            </textarea>
                            {{-- @if (errors->has('message'))
                            <p>{{errors->first('message')}}</p>
                            @endif --}}
                        </div>
                        <button class="btn btn-sm btn-accent">
                            Submit
                        </button>
                    </form>
                </div>

                {{--
                    ---------------------------------------------------
                        DITO YUNG PROFILE
                    ---------------------------------------------------
                    --}}

                <div class="w-2/6 flex flex-col space-y-4">
                    <div class="w-full flex items-center justify-start">
                        <h1 class="text-base font-bold">Profile</h1>
                    </div>

                    {{-- @if ($profile) --}}
                    <div class="rounded shadow-sm h-fit w-full bg-white pb-4">
                        <div class="w-full h-fit relative ">
                            <a href="{{ route('profile.edit') }}">
                                <i
                                    class='bx bx-edit-alt text-xl px-1 opacity-80 top-4 right-4 absolute
                                    bg-gray-200 bg-opacity-50 rounded cursor-pointer hover:bg-gray-700 hover:text-white'></i>
                            </a>
                            <div class="w-full h-32 rounded-t bg-gradient-to-r from-green-200 to-blue-200"></div>
                            <img src="{{ $profile ? asset('storage/profile/' . $profile->image) : '' }}" alt=""
                                class="w-36 h-36 rounded-full absolute border bg-white border-gray-200 top-12 left-1/2 transform -translate-x-1/2">
                        </div>
                        <div class="pt-20 flex flex-col items-center justify-start">
                            <p class="text-xl font-bold">
                                {{ $profile ? $profile->first_name . ' ' . $profile->last_name : 'Your Name' }}</p>
                            <p class="text-base ">{{ $profile->user->email ?? 'Your Email' }}</p>
                            <p class="text-sm ">{{ $profile->phone ?? 'Your Phone' }}</p>
                            <div class="pt-4 flex items-start justify-center w-[80%]">
                                {{--
                                    --------------------------------------
                                        ADDRESS TO DITO NG CUSTOMER
                                    -------------------------------------
                                    --}}
                                <p class="text-sm text-center"></p>
                            </div>
                        </div>
                    </div>
                    {{-- @endif --}}

                    @if ($cart !== null)
                        <div class="w-full flex items-center justify-start">
                            <h1 class="text-base font-bold">Cart Preview</h1>
                        </div>
                        <div class="rounded shadow-sm h-fit w-full bg-white p-4">
                            <div class="w-full flex items-center justify-start pb-2">
                                <h1 class="text-base font-bold">Cart Items {{ $cart->products->count() }}</h1>
                            </div>
                            <div class="flex flex-col space-y-2">

                                @foreach ($cart->products as $c_product)
                                    <div class="flex justify-between p-2 px-1 border-t border-gray-200">
                                        <div class="flex items-center space-x-3">
                                            <img src="{{ $c_product->product->image }}" alt=""
                                                class="w-10 h-10 border border-gray-200 ">
                                            <div>
                                                <p class="text-sm font-bold">{{ $c_product->product->name }}</p>
                                                <p class="text-xs text-gray-500">
                                                    {{ $c_product->product->categories[0]->name }}</p>
                                            </div>
                                        </div>
                                        <p class="text-sm">&#8369 {{ $c_product->product->price }}</p>
                                    </div>
                                @endforeach

                                <div class="w-full flex pt-2">
                                    <a href="{{ route('client.cart.index', ['id' => $cart->id]) }}"
                                        class="text-sm text-white w-full text-center rounded py-2 bg-blue-700">VIEW</a>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
</x-app-layout>
