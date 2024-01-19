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




        <!-- Main modal -->
        <div id="default-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
            x-data="conversation" x-init="getConversation({{ Auth::user()->id }})">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Terms of Service
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <!-- component -->

                        <template x-if="convo !== null">
                            <div class="flex-1 p:2 justify-between flex flex-col h-[580px]">
                                <div class="flex sm:items-center py-3 border-b-2 border-gray-200">
                                    <div class="relative flex items-center space-x-4">
                                        {{-- <div class="relative">
                                            <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                                                alt="" class="w-10 sm:w-16 h-10 sm:h-16 rounded-full">
                                        </div> --}}
                                        <div class="flex flex-col leading-tight">
                                            <div class="text-2xl mt-1 flex items-center">
                                                <span class="text-gray-700 mr-3" x-text="convo.participant.name"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="messages"
                                    class="flex flex-col-reverse space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">

                                    <template x-if="convo.messages.length !== 0">
                                        <template x-for="message in convo.messages" :key="message.id">
                                            <div class="chat-message">
                                                <div :class="`${ message.sender_id == '{{Auth::user()->id}}' ? 'flex items-end justify-end'  : 'flex items-start' }`">
                                                    <div
                                                        :class=" `${ message.sender_id == '{{Auth::user()->id}}' ? 'flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end'  : 'flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start' }`
                                                         ">
                                                         <div class="flex flex-col">
                                                            <span
                                                                :class="`${ message.sender_id == '{{ Auth::user()->id }}' ? 'px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white'  : 'px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600' }`"
                                                                x-text="message.content"></span>
                                                                <template x-if="message.sender_id == '{{Auth::user()->id}}' && message.seen === 1">
                                                                    <span class="text-xs text-end">
                                                                        seen
                                                                    </span>
                                                                </template>
                                                        </div>
                                                    {{-- <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                                                        alt="My profile" class="w-6 h-6 rounded-full order-1"> --}}
                                                </div>
                                            </div>
                                        </template>

                                        <div class="chat-message">
                                            <div class="flex items-end justify-end">
                                                <div
                                                    class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                                                    <div><span
                                                            class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">Your
                                                            error message says permission denied, npm global installs
                                                            must
                                                            be
                                                            given root privileges.</span></div>
                                                </div>
                                                <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                                                    alt="My profile" class="w-6 h-6 rounded-full order-2">
                                            </div>
                                        </div>
                                    </template>
                                    <template class="convo.messages === 0">
                                        <div class="w-full h-full justify-center items-center">
                                            <h1 class="text-gray-500">
                                                Start Conversation
                                            </h1>
                                        </div>
                                    </template>
                                </div>
                                <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
                                    <div class="relative flex ">
                                        <input type="text" x-model="message" placeholder="Write your message!"
                                            class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-md py-3">
                                        <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
                                            <button type="button" @click="sendMessage"
                                                class="inline-flex items-center justify-center rounded px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                                                <span class="font-bold">Send</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="h-6 w-6 ml-2 transform rotate-90">
                                                    <path
                                                        d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template x-if="convo === null">
                            <div class="flex items-center w-full justify-center">
                                <button class="btn btn-sm btn-accent" @click="createConversation">Message
                                    Admin</button>
                            </div>
                        </template>
                        <style>
                            .scrollbar-w-2::-webkit-scrollbar {
                                width: 0.25rem;
                                height: 0.25rem;
                            }

                            .scrollbar-track-blue-lighter::-webkit-scrollbar-track {
                                --bg-opacity: 1;
                                background-color: #f7fafc;
                                background-color: rgba(247, 250, 252, var(--bg-opacity));
                            }

                            .scrollbar-thumb-blue::-webkit-scrollbar-thumb {
                                --bg-opacity: 1;
                                background-color: #edf2f7;
                                background-color: rgba(237, 242, 247, var(--bg-opacity));
                            }

                            .scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
                                border-radius: 0.25rem;
                            }
                        </style>

                        <script>
                            const el = document.getElementById('messages')
                            el.scrollTop = el.scrollHeight
                        </script>

                    </div>

                </div>
            </div>
        </div>

    </section>


    @push('js')
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
    @endpush

</x-app-layout>
