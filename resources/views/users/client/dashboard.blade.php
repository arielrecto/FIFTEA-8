<x-app-layout>

    <x-user-header />

    <section class="bg-gray-50 text-gray-700">
        <div class="max-w-[1300px] mx-auto px-4 pt-24 pb-4">
            <div class="flex flex-col md:flex-row items-start justify-between md:space-x-6 space-y-4 md:space-y-0">

                <div class="w-full md:w-4/6 flex flex-col space-y-4">

                    {{--
                    ---------------------------------------------------
                        ITO YUNG PART NG TOTAL AMOUNT SPENT
                    ---------------------------------------------------
                    --}}
                    <div class="w-full flex items-center justify-start">
                        <h1 class="text-base font-bold">Overview</h1>
                    </div>
                    <div
                        class="flex flex-col md:flex-row items-start justify-between md:space-x-4 space-y-4 md:space-y-0">
                        <div class="w-full md:w-1/3 h-32 rounded shadow-md p-4 bg-cyan-500  relative">
                            <div class="h-1/3 flex items-center space-x-2">
                                <i class='bx bx-credit-card text-2xl text-white'></i>
                                <p class="text-base text-white">Total Amount Spent</p>
                            </div>
                            <div class="w-full h-2/3 flex items-center justify-start">
                                <span class="text-2xl font-bold text-white">&#8369 {{ $spent }}</span>
                            </div>
                            <i class='bx bx-bar-chart absolute bottom-0 right-0 text-7xl opacity-25 text-white'></i>
                        </div>
                        <div class="w-full md:w-1/3 h-32 rounded shadow-md p-4 bg-violet-500 relative">
                            <div class="h-1/3 flex items-center space-x-2">
                                <i class='bx bx-shopping-bag text-2xl text-white'></i>
                                <p class="text-base text-white">Pending Orders</p>
                            </div>
                            <div class="w-full h-2/3 flex items-center justify-start">
                                <span class="text-2xl font-bold text-white">{{ $orderPending->count() }}</span>
                            </div>
                            <i class='bx bx-shopping-bag absolute bottom-1 right-2 text-6xl opacity-25 text-white'></i>
                        </div>
                        <div class="w-full md:w-1/3 h-32 rounded shadow-md p-4 bg-pink-400  relative">
                            <div class="h-1/3 flex items-center space-x-2">
                                <i class='bx bx-package text-2xl text-white'></i>
                                <p class="text-base text-white">Confirmed Orders</p>
                            </div>
                            <div class="w-full h-2/3 flex items-center justify-start">
                                <span class="text-2xl font-bold text-white">{{ $confirmOrder }}</span>
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
                                <div class="w-full flex items-start space-x-1 ">
                                    <img src="{{ route('media.product', ['name' => $product->image]) }}" alt=""
                                        class="w-32 h-full rounded-l-md bg-blue-200 object-center object-cover ">

                                    <div class="w-full h-full flex flex-col space-y-2 justify-between p-2 ">
                                        <div>
                                            <h1 class="text-base font-bold">{{ $product->name }}</h1>
                                            <p class="text-sm">{!! strlen($product->description) > 50 ? substr($product->description, 0, 50) . '...' : $product->description !!}</p>
                                        </div>
                                        <div x-data="starRating">
                                            <template x-for="i in 5">
                                                <input type="radio" name="rating-5"
                                                    :class="`mask mask-star-2 ${i <= {{ $product->cart_avg_rate ?? 1 }} ? 'bg-yellow-400' : '' }`"
                                                    disabled />
                                            </template>
                                        </div>
                                        <div class="flex space-x-3 items-center justify-end ">
                                            <p class="text-sm font-bold">&#8369; {{ $product->price }}</p>
                                            <a href="/client/products/{{ $product->id }}"
                                                class="py-1 px-4 rounded text-sm text-white bg-blue-700">Order</a>
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

                    <div class="min-h-[300px] h-auto flex flex-col space-y-2">

                        @forelse ($orders as $order)

                            <div tabindex="0"
                                class="collapse collapse-arrow border border-gray-200 shadow-sm rounded bg-white">
                                <div class="w-full p-4 py-2 flex items-center justify-between">
                                    <div class="w-full flex items-center justify-between">
                                        <div
                                            class="flex flex-col md:flex-row md:items-center md:space-x-4 space-y-1 md:space-y-0">
                                            <p class="text-sm"><span class="font-bold hidden md:block">Order Number:
                                                </span> {{ $order->num_ref }}</p>
                                            <p class="text-sm"><span class="font-bold hidden md:block">Date:</span>
                                                {{ $order->created_at->format('M-d-Y') }}</p>
                                            <p class="text-sm"><span class="font-bold hidden md:block">Total
                                                    Price:</span> &#8369 {{ $order->total }}</p>
                                        </div>
                                        <div class="flex items-center space-x-4 px-4">
                                            @if ($order->status == 'pending')
                                                <p class="text-sm bg-red-500 text-white rounded py-1 px-2">
                                                    {{ $order->status }}</p>
                                            @elseif ($order->status == 'processed')
                                                <p class="text-sm font-bold bg-blue-500 text-white rounded py-1 px-2">
                                                    {{ $order->status }}</p>
                                            @elseif ($order->status == 'delivery')
                                                <p class="text-sm font-bold bg-orange-500 text-white rounded py-1 px-2">
                                                    {{ $order->status }}</p>
                                            @elseif ($order->status == 'done')
                                                <p class="text-sm font-bold bg-green-500 text-white rounded py-1 px-2">
                                                    {{ $order->status }}</p>
                                            @endif
                                            <a href="{{ route('client.order.show', ['order' => $order->id]) }}"
                                                class="text-sm text-blue-600">View</a>
                                        </div>
                                    </div>
                                    <i class='bx bx-chevron-down text-2xl'></i>
                                </div>

                                {{--
                                ---------------------------------------------------
                                    DITO YUNG MGA ITEMS NG ORDER
                                ---------------------------------------------------
                                --}}

                                <div class="collapse-content flex flex-col space-y-4">
                                    @foreach ($order->cart->products as $c_product)
                                        <div
                                            class="flex flex-col space-y-2 justify-between p-2 px-1 border-t border-gray-200">
                                            {{-- @dd($c_product) --}}
                                            <div
                                                class="w-full flex items-end justify-between border-b border-dashed border-gray-300 py-1">
                                                <div class="flex items-center space-x-3">
                                                    <img src="{{ route('media.product', ['name' => $c_product->product->image]) }}"
                                                        alt="" class="w-10 h-10 border border-gray-200 ">
                                                    <div>
                                                        <p class="text-sm font-bold">{{ $c_product->product->name }}
                                                        </p>
                                                        <p class="text-xs text-gray-500">
                                                            {{ $c_product->product->categories[0]->name }}</p>
                                                    </div>
                                                </div>
                                                <p class="text-sm">&#8369 {{ $c_product->product->price }}</p>
                                            </div>

                                            <div class="border-b border-dashed border-gray-300">
                                                <p class="text-sm">
                                                    <span class="font-semibold">
                                                        Sugar level:
                                                    </span>
                                                    <span>
                                                        {{ $c_product->sugar_level * 100 }} %
                                                    </span>
                                                </p>
                                            </div>

                                            <div
                                                class="w-full flex items-end justify-between border-b border-dashed border-gray-300">
                                                <div>
                                                    @php
                                                        $extras = json_decode($c_product->extras);
                                                    @endphp
                                                    <p class="text-sm ">
                                                        <span class="font-semibold">Extra:</span>
                                                        @if (!empty($extras))
                                                            @foreach ($extras as $extra)
                                                                {{ $extra->name }} (&#8369
                                                                {{ $extra->pivot->price }})
                                                            @endforeach
                                                        @else
                                                            <span class="text-sm">No Extra</span>
                                                        @endif
                                                    </p>
                                                </div>
                                                @if (!empty($extras))
                                                    <span class="text-sm">&#8369

                                                        @php
                                                            $totalExtrasPrice = 0;

                                                            foreach ($extras as $_extra) {
                                                                $totalExtrasPrice += $extra->pivot->price;
                                                            }
                                                        @endphp
                                                        {{ $totalExtrasPrice }}

                                                    </span>
                                                @endif
                                            </div>

                                            <div
                                                class="w-full flex items-end justify-between border-b border-dashed border-gray-300">
                                                @php
                                                    $size = json_decode($c_product->size);
                                                @endphp
                                                @if ($size !== null)
                                                    <div>
                                                        <p class="text-sm"><span class="font-semibold">Size:</span>
                                                            {{ $size->name }}</p>
                                                    </div>
                                                    <span class="text-sm">&#8369 {{ $size->price }}</span>
                                                @endif

                                            </div>
                                            <div
                                                class="w-full flex items-end justify-between border-b border-dashed border-gray-300">
                                                <span class="text-sm font-semibold">Total:</span>
                                                <span class="text-sm font-semibold">&#8369
                                                    {{ $c_product->total }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @empty
                            <div class="h-[280px] w-full flex items-center justify-center">
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

                <div class="w-full md:w-2/6 flex flex-col space-y-4">
                    <div class="hidden md:flex w-full items-center justify-start">
                        <h1 class="text-base font-bold">Profile</h1>
                    </div>

                    {{-- @if ($profile) --}}
                    <div class="hidden md:block rounded shadow-sm h-fit w-full bg-white pb-4">
                        <div class="w-full h-fit relative ">
                            <a href="{{ route('profile.edit') }}">
                                <i
                                    class='bx bx-edit-alt text-xl px-1 opacity-80 top-4 right-4 absolute
                                    bg-gray-200 bg-opacity-50 rounded cursor-pointer hover:bg-gray-700 hover:text-white'></i>
                            </a>
                            <div class="w-full h-32 rounded-t bg-green-200"></div>


                            @if (Auth::user()->profile->image)
                                <img src="{{ asset('storage/' . auth()->user()->profile->image) }}"
                                class="w-36 h-36 rounded-full absolute border bg-white border-gray-200 top-12 left-1/2 transform -translate-x-1/2" />
                            @else
                                @if (Auth::user()->profile->sex == 'Male')
                                    <img id="db-cover-photo"
                                    src="{{asset('images/male.png')}}" alt="Image"
                                    class="w-36 h-36 rounded-full absolute border bg-white border-gray-200 top-12 left-1/2 transform -translate-x-1/2" />
                                @else
                                    <img id="db-cover-photo"
                                    src="{{asset('images/female.png')}}" alt="Image"
                                    class="w-36 h-36 rounded-full absolute border bg-white border-gray-200 top-12 left-1/2 transform -translate-x-1/2" />
                                @endif
                            @endif
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
                                            <img src="{{ route('media.product', ['name' => $c_product->product->image]) }}"
                                                alt="" class="w-10 h-10 border border-gray-200 ">
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


    {{-- @push('js')
        <script>
            const conversation = () => ({
                convo: null,
                message: '',
                async getConversation() {
                    try {

                        const response = await axios.get(`conversation`);

                        this.convo = {
                            ...response.data.conversation
                        }

                        setTimeout(() => {
                            this.getConversation()
                        }, 5000);

                    } catch (error) {
                        console.log(error.response);
                    }
                },
                async createConversation() {
                    try {

                        const config = {
                            header: {
                                accept: "application/json",
                                "content-type": "application/json",
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                    "content"
                                ),
                            },
                        };

                        const response = await axios.post('conversation/create', config);


                        this.convo = {
                            ...response.data.conversation
                        }

                    } catch (error) {
                        console.log(error);
                    }
                },
                async sendMessage() {
                    try {

                        const config = {
                            header: {
                                accept: "application/json",
                                "content-type": "application/json",
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                    "content"
                                ),
                            },
                        };

                        const data = {
                            message: this.message
                        }
                        console.log(this.message);
                        const response = await axios.post(`conversation/${this.convo.id}/message/send`, data,
                            config);

                        this.message = null

                    } catch (error) {
                        console.log(error);
                    }

                }
            });
        </script>
    @endpush --}}

</x-app-layout>
