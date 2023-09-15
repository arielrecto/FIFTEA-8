<x-app-layout>

    <x-user-header/>

    <section class="bg-gray-100">
        <div class="max-w-[1300px] mx-auto px-4 pt-24 pb-4">
            <div class="flex items-start justify-between space-x-6">
                <div class="w-4/6 flex flex-col space-y-4">
                    {{--
                    ---------------------------------------------------
                        ITO YUNG PART NG TOTAL AMOUNT SPENT
                    ---------------------------------------------------
                    --}}
                    <div class="w-full flex items-center justify-start">
                        <h1 class="text-base font-bold">Overview</h1>
                    </div>
                    <div class="flex items-start justify-between space-x-4">
                        <div
                            class="w-1/3 h-32 rounded shadow-md p-4 bg-gradient-to-r from-cyan-500 to-blue-400  relative">
                            <div class="h-1/3 flex items-center space-x-2">
                                <i class='bx bx-credit-card text-2xl text-white'></i>
                                <p class="text-base text-white">Total Amount Spent</p>
                            </div>
                            <div class="w-full h-2/3 flex items-center justify-start">
                                <span class="text-2xl font-bold text-white">&#8369 {{ $spent }}</span>
                            </div>
                            <i class='bx bx-bar-chart absolute bottom-0 right-0 text-7xl opacity-25 text-white'></i>
                        </div>
                        <div
                            class="w-1/3 h-32 rounded shadow-md p-4 bg-gradient-to-r from-violet-500 to-fuchsia-400 relative">
                            <div class="h-1/3 flex items-center space-x-2">
                                <i class='bx bx-shopping-bag text-2xl text-white'></i>
                                <p class="text-base text-white">Pending Orders</p>
                            </div>
                            <div class="w-full h-2/3 flex items-center justify-start">
                                <span class="text-2xl font-bold text-white">{{ $orderPending->count() }}</span>
                            </div>
                            <i class='bx bx-shopping-bag absolute bottom-1 right-2 text-6xl opacity-25 text-white'></i>
                        </div>
                        <div
                            class="w-1/3 h-32 rounded shadow-md p-4 bg-gradient-to-r from-purple-500 to-pink-400  relative">
                            <div class="h-1/3 flex items-center space-x-2">
                                <i class='bx bx-package text-2xl text-white'></i>
                                <p class="text-base text-white">Delivered Orders</p>
                            </div>
                            <div class="w-full h-2/3 flex items-center justify-start">
                                <span class="text-2xl font-bold text-white">6</span>
                            </div>
                            <i class='bx bx-package absolute bottom-1 right-2 text-6xl opacity-25 text-white'></i>
                        </div>
                    </div>

                    {{--
                    ---------------------------------------------------
                        ITO YUNG PART NG RECOMMENDATIONS
                    ---------------------------------------------------
                    --}}
                    <div class="w-full flex items-center justify-start">
                        <h1 class="text-base font-bold">Recommendations</h1>
                    </div>
                    <div class="carousel carousel-center max-w-full flex gap-4">
                        @foreach ($products as $product)
                            <div
                                class="carousel-item w-[350px] h-44 rounded-md shadow-md border border-gray-200 bg-gray-50">
                                <div class="flex items-start space-x-1 ">
                                    <img src="{{ $product->image }}" alt=""
                                        class="min-w-[200px] w-[200px] h-full rounded-l-md bg-gradient-to-r from-green-200 to-blue-200 ">
                                    <div class="h-full flex flex-col space-y-2 p-2 relative">
                                        <h1 class="text-base font-bold">{{ $product->name }}</h1>
                                        <p class="text-sm">{!! $product->description !!}</p>
                                        <div class="flex space-x-3 items-center absolute bottom-2 right-3">
                                            <p class="text-sm font-bold">&#8369; {{ $product->price }}</p>
                                            <a href=""
                                                class="py-1 px-4 rounded text-sm text-white bg-gradient-to-r from-green-400 to-blue-400">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{--
                    ---------------------------------------------------
                        ITO YUNG PART NG ORDER HISTORY
                    ---------------------------------------------------
                    --}}
                    <div class="w-full flex items-center justify-start">
                        <h1 class="text-base font-bold">Order History</h1>
                    </div>

                    <div class="min-h-[300px] h-auto flex flex-col space-y-2 px-2 py-3 rounded bg-white shadow">

                        @forelse ($orders as $order)
                            <div tabindex="0"
                                class="collapse collapse-arrow border border-gray-400 shadow-sm rounded bg-gray-200">
                                <div class="p-4 py-2 flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <p class="text-sm font-bold">{{ $order->num_ref }}</p>
                                        <p class="text-sm font-bold">DATE: {{ $order->created_at->format('M-d-Y') }}
                                        </p>
                                        <p class="text-sm font-bold">TOTAL: &#8369 {{ $order->total }}</p>
                                    </div>
                                    <i class='bx bx-chevron-down text-2xl'></i>
                                </div>

                                {{--
                        ---------------------------------------------------
                            DITO YUNG MGA ITEMS NG ORDER
                        ---------------------------------------------------
                        --}}

                                <div class="collapse-content">

                                    @foreach ($order->cart->products as $c_product)
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
                                            <p class="text-sm">&#8369 150</p>
                                        </div>
                                    @endforeach


                                </div>

                            </div>
                        @empty
                            <div class="h-[280px] w-full flex items-center justify-center" >
                                <p class="text-sm font-bold text-red-600">No Oders</p>
                            </div>
                        @endforelse

                    </div>

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
                    <div class="rounded shadow-sm h-fit w-full bg-white pb-4">
                        <div class="w-full h-fit relative ">
                            <a href="{{route('profile.edit')}}">
                                <i
                                    class='bx bx-edit-alt text-xl px-1 opacity-80 top-4 right-4 absolute
                                 bg-gray-200 bg-opacity-50 rounded cursor-pointer hover:bg-gray-700 hover:text-white'></i>
                            </a>
                            <div class="w-full h-32 rounded-t bg-gradient-to-r from-green-200 to-blue-200"></div>
                            <img src="{{ asset('storage/profile/' . $profile->image) }}" alt=""
                                class="w-36 h-36 rounded-full absolute border border-gray-200 top-12 left-1/2 transform -translate-x-1/2">
                        </div>
                        <div class="pt-20 flex flex-col items-center justify-start">
                            <p class="text-xl font-bold">{{ $profile->first_name . ' ' . $profile->last_name }}</p>
                            <p class="text-base ">{{ $profile->user->email }}</p>
                            <p class="text-sm ">09123456789</p>
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
                                    <a href="{{route('client.cart.index',['id' => $cart->id])}}"
                                        class="text-sm text-white w-full text-center rounded py-2 bg-gradient-to-r from-green-400 to-blue-400">VIEW</a>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
</x-app-layout>
