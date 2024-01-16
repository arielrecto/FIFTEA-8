<x-app-layout>
    <x-header :cart="$cart" :subtotal="$total" />
    <section class="pt-16 bg-white text-gray-700">
        <div class="max-w-[1300px] mx-auto flex px-4">
            <div class="w-full flex-col md:p-4">
                <div class="w-full py-4 ">
                    <h1 class="text-xl font-sans font-bold">Your Cart</h1>
                </div>
                <div class="w-full flex flex-col space-y-6 md:space-y-0 md:flex-row md:space-x-4" x-data="productData">
                    <div class="flex flex-col w-full md:w-2/3">
                        <div class="w-full overflow-hidden rounded border border-gray-200 bg-white">
                            <div class="w-full overflow-x-auto bg-white">
                                <table class="w-full whitespace-no-wrap bg-white">
                                    <thead>
                                        <tr
                                            class="text-xs tracking-wide text-left text-gray-500 uppercase border-b bg-gray-200">
                                            <th class="px-4 py-3 min-w-[150px]">Product</th>
                                            <th class="px-4 py-3">Size</th>
                                            <th class="px-4 py-3">Extras</th>
                                            <th class="px-4 py-3">Quantity</th>
                                            <th class="px-4 py-3">Total Price</th>
                                            <th colspan="2" class="px-4 py-3">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y">
                                        @forelse ($cart->products as $c_product)
                                            <tr class="text-gray-700 ">
                                                <td class="px-4 py-3 min-w-[150px]">
                                                    <div class="flex items-center space-x-2">
                                                        <img class="w-12 h-12 rounded"
                                                            src="{{ route('media.product', ['name' => $c_product->product->image]) }}"
                                                            alt="">

                                                        <div class="flex flex-col">
                                                            <h1 class="title-font text-sm font-medium text-gray-800 3">
                                                                {{ $c_product->product->name }}
                                                            </h1>
                                                            <h2
                                                                class="tracking-widest text-xs title-font font-medium text-gray-400">
                                                                {{ $c_product->product->categories()->first()->name }}
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </td>
                                                {{-- <td class="px-4 py-3">&#8369 {{ $c_product->product->price }}</td> --}}
                                                @php
                                                    $size = json_decode($c_product->size);
                                                @endphp
                                                <td class="px-4 py-3">{{ $size->name }} <span
                                                        class="text-xs text-blue-500">(&#8369;
                                                        {{ $size->price }})</span></td>
                                                {{--  pabago ng pice dito tol --}}

                                                @php
                                                    $extras = json_decode($c_product->extras);
                                                @endphp

                                                <td class="px-4 py-3">
                                                    @if (!empty($extras))
                                                        @foreach ($extras as $extra)
                                                            <p class="flex items-center">
                                                                {{ $extra->name }}
                                                                <span class="text-xs text-blue-500 ml-2">
                                                                    (&#8369; {{ $extra->pivot->price }})
                                                                </span>
                                                            </p>
                                                        @endforeach
                                                    @else
                                                        <p class="text-xs text-red-400">No Extra</p>
                                                    @endif
                                                </td>
                                                </td>
                                                <td class="px-4 py-3">{{ $c_product->quantity }}</td>
                                                <td class="px-4 py-3">&#8369; {{ $c_product->total }}</td>
                                                <td class="px-4 py-3">
                                                    <a
                                                        href="{{ route('client.cart.showProduct', ['id' => $c_product->id]) }}">
                                                        <i
                                                            class='bx bx-edit text-blue-700 text-lg hover:text-sbgreen cursor-pointer'></i>
                                                    </a>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <form
                                                        action="{{ route('client.cart.deleteCartItem', ['id' => $c_product->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">
                                                            <i class='bx bx-x text-2xl text-gray-500'></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <td>
                                                <p class="text-sm text-red-600">Not item</p>
                                            </td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/3">
                        <div class="w-full flex flex-col space-y-4 p-4 rounded border border-gray-200">
                            <div class="w-full">
                                <h1 class="text-lg font-bold">Summary</h1>
                            </div>
                            <div class="w-full flex flex-col space-y-6 px-2">
                                <div class="w-full flex justify-between border-b border-gray-200 pb-1">
                                    <p class="font-medium text-sm">ITEMS</p>
                                    <P class="font-medium text-sm">{{ $cart->products->count() }}</P>
                                </div>
                                <div class="flex flex-col space-y-4">
                                    @foreach ($cart->products as $c_product)
                                        <div class="w-full flex justify-between items-start">
                                            <div class="w-full flex flex-col space-y-2">
                                                <div class="w-full flex justify-between items-start">
                                                    <div class="flex items-center space-x-2">
                                                        <img class="w-10 h-10 rounded"
                                                            src="{{ route('media.product', ['name' => $c_product->product->image]) }}"
                                                            alt="">

                                                        <div class="flex flex-col">
                                                            <h1 class="title-font text-sm font-medium text-gray-800 3">
                                                                {{ $c_product->product->name }}
                                                            </h1>
                                                            <h2
                                                                class="tracking-widest text-xs title-font font-medium text-gray-400">
                                                                {{ $c_product->product->categories()->first()->name }}
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="font-medium text-sm">&#8369 {{ $c_product->total }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="w-full flex flex-col space-y-2">
                                                    <div class="flex flex-col space-y-1">
                                                        <span
                                                            class="w-full border-b border-dashed border-gray-200 text-sm font-semibold">Sugar
                                                            Level</span>
                                                        <div class="w-full flex items-center justify-between">
                                                            <span class="text-xs">Percent</span>
                                                            <span
                                                                class="text-xs">{{ $c_product->sugar_level * 100 }}%</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col space-y-1">
                                                        <span
                                                            class="w-full border-b border-dashed border-gray-200 text-sm font-semibold">Size</span>
                                                        <div class="w-full flex items-center justify-between ">
                                                            @php
                                                                $size = json_decode($c_product->size);
                                                            @endphp
                                                            <span class="text-xs">{{ $size->name }}</span>
                                                            <span class="text-xs">&#8369; {{ $size->price }}</span>
                                                        </div>
                                                    </div>
                                                    @php
                                                        $extras = json_decode($c_product->extras);
                                                    @endphp
                                                    <div class="flex flex-col space-y-1">
                                                        <span
                                                            class="w-full border-b border-dashed border-gray-200 text-sm font-semibold">Extra</span>
                                                        @if (!empty($extras))
                                                            @foreach ($extras as $extra)
                                                                <div class="w-full flex items-center justify-between ">
                                                                    <span class="text-xs">{{ $extra->name }}</span>
                                                                    <span
                                                                        class="text-xs">&#8369;{{ $extra->pivot->price }}</span>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <span class="text-xs">None</span>
                                                        @endif
                                                    </div>
                                                    <div
                                                        class="w-full flex items-center justify-between border-t border-gray-400 py-1">
                                                        <span class="text-xs">Quantity</span>
                                                        <span class="text-xs">{{ $c_product->quantity }} pc(s) </span>
                                                    </div>
                                                    <div
                                                        class="w-full flex items-center justify-between border-t border-gray-400 py-1">
                                                        <span class="w-full text-sm font-semibold">Total</span>
                                                        <span class="text-xs">&#8369;{{ $c_product->total }} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="w-full flex justify-between border-t border-gray-400 pt-2">
                                    <p class="font-medium text-sm">TOTAL PRICE</p>
                                    <P class="font-medium text-sm">&#8369 {{ $total }}</P>
                                </div>
                            </div>

                            <form action="{{ route('client.order.store') }}" method="post" x-data="payment"
                                enctype="multipart/form-data">
                                <div class="flex flex-wrap">
                                    <div class="p-2">
                                        <button @click="openToggle($event)">
                                            <img src="{{ asset('images/screenshot.png') }}" alt=""
                                                class="h-12">
                                        </button>
                                    </div>
                                </div>

                                <div class="flex flex-col space-y-4 py-2" x-show="toggle" x-transition.duration.700ms>
                                    <div class="w-full flex justify-center">
                                        @if ($gcash !== null)
                                            <img src="{{ route('media.gcash', ['name' => $gcash->image]) }}"
                                                alt="" class="object object-center w-1/2 h-1/2">
                                        @else
                                            <img src="{{ asset('images/QRCODE.jpg') }}" alt=""
                                                class="object object-center w-1/2 h-1/2">
                                        @endif

                                    </div>
                                    <div class="w-full flex flex-col gap-2">
                                        <label for="" class="text-sm text-gray-700 font-semibold">GCASH
                                            REFERENCE NUMBER</label>
                                        <input type="text"
                                            class="text-base px-4 py-2 border border-gray-300 rounded" name="qr_ref"
                                            placeholder="reference number" oninput="limitInput(this, 13, true)">
                                        @if ($errors->has('qr_ref'))
                                            <p class="text-xs text-error">{{ $errors->first('qr_ref') }}</p>
                                        @endif
                                    </div>
                                    <script>
                                        function limitInput(element, maxLength, onlyNumbers) {
                                            let inputValue = element.value;
                                            if (onlyNumbers) {
                                                // Allow only numbers by removing non-numeric characters
                                                inputValue = inputValue.replace(/[^0-9]/g, '');
                                            }

                                            // Limit the input length
                                            if (inputValue.length > maxLength) {
                                                inputValue = inputValue.slice(0, maxLength);
                                            }

                                            // Update the input value
                                            element.value = inputValue;
                                        }
                                    </script>
                                    <div class="w-full flex flex-col gap-2">
                                        <label for="" class="text-sm text-gray-700 font-semibold">UPLOAD
                                            RECEIPT IMAGE <span class="text-xs">(jpg or jpeg only)</span></label>
                                        <input type="file" name="image"
                                            class="file-input file-input-ghost w-full border border-gray-300 rounded text-base" />
                                        @if ($errors->has('image'))
                                            <p class="text-xs text-error">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>
                                    {{-- <div class="w-full flex flex-col gap-2">
                                        <label for="" class="text-sm ">AMOUNT</label>
                                        <input type="text" class="text-base px-4 py-2 border border-gray-300 rounded"
                                            name="amount" placeholder="amount">
                                        @if ($errors->has('amount'))
                                            <p class="text-xs text-error">{{ $errors->first('amount') }}</p>
                                        @endif
                                    </div> --}}
                                </div>

                                <div class="w-full flex">
                                    @csrf
                                    <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                    <input type="hidden" name="total" value="{{ $total }}">
                                    <button
                                        class="w-full text-white text-sm bg-sbgreen rounded py-2 px-4">CHECKOUT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('js')
        <script>
            function productData() {
                return {
                    modal: null,
                    product: null,
                    openModal(data) {

                    }
                }
            }
        </script>
        <script>
            function payment() {
                return {
                    toggle: true,
                    openToggle(e) {
                        e.preventDefault();
                        this.toggle = !this.toggle
                    }
                }
            }
        </script>
    @endpush
</x-app-layout>
