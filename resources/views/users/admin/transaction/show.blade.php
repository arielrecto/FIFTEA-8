<x-panel>
    <section class="p-5 flx flex-col space-y-5">
        <div class="flex items-start space-x-4">
            <div class="flex flex-col gap-2 h-full w-full">
                <div class="grid grid-cols-2 grid-flow-row border-2 bg-gray-200 h-fit p-2 rounded-lg ">
                    <div class="w-full flex flex-col gap-2">
                        <h1 class="text-lg">Transaction Number</h1>
                        <h1 class="text-sm">
                            {{ $transaction->transaction_ref }}
                        </h1>
                    </div>
                    <div class="w-full flex flex-col gap-2">
                        <h1 class="text-lg">Order Number</h1>
                        <h1 class="text-sm">
                            {{ $transaction->order->num_ref }}
                        </h1>
                    </div>
                </div>

                <h1 class="text-lg">
               <span class="font-bold">Total</span>   : <span>{{$transaction->order->total}}</span>
                </h1>
                <h1 class="text-xl font-bold">
                    Products
                </h1>
                <div class="overflow-x-auto w-full">
                    <table class="w-full bg-white border border-collapse">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th class="border px-4 py-2"></th>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Size</th>
                                <th class="border px-4 py-2">Sugar Level</th>
                                <th class="border px-4 py-2">Quantity</th>
                                <th class="border px-4 py-2">Extra</th>
                                <th class="border px-4 py-2">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transaction->order->cart->products as $cart_product)
                                <tr>
                                    <td class="border px-4 py-2">{{ $cart_product->product->id }}</td>
                                    <td class="border px-4 py-2">{{ $cart_product->product->name }}</td>
                                    @php
                                        $size = json_decode($cart_product->size);
                                    @endphp
                                    @if ($size !== null)
                                        <td class="border px-4 py-2">{{ $size->name }}</td>
                                    @else
                                        <td class="border px-4 py-2"></td>
                                    @endif
                                    <td class="border px-4 py-2">{{ $cart_product->sugar_level }}</td>
                                    <td class="border px-4 py-2">{{ $cart_product->quantity }}</td>

                                    @php
                                        $extra = json_decode($cart_product->extras)
                                    @endphp
                                    @if($extra !== null)

                                    <td class="border px-4 py-2">{{$extra->name}} (&#8369;  {{$extra->pivot->price}})</td>
                                    @else
                                    <td class="border px-4 py-2">No Extras </td>
                                    @endif

                                    <td class="border px-4 py-2">&#8369; {{ $cart_product->total }}</td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</x-panel>
