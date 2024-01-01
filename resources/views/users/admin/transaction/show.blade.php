<x-panel>
    <section class="p-5 flx flex-col space-y-5">
        <div class="flex items-start space-x-4">
            <div class="flex flex-col gap-2 h-full w-full">
                <div class="grid grid-cols-2 grid-flow-row border-2 bg-gray-200 h-32 p-2 rounded-lg ">
                    <div class="w-full flex flex-col gap-2">
                        <h1 class="text-lg">Transaction #</h1>
                        <h1 class="text-lg fontb-bold">
                            {{ $transaction->transaction_ref }}
                        </h1>
                    </div>
                    <div class="w-full flex flex-col gap-2">
                        <h1 class="text-lg">Order #</h1>
                        <h1 class="text-lg fontb-bold">
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
                    <table class="table w-full">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Sugar Level</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($transaction->order->cart->products as $cart_product)
                            <tr class="bg-base-200">
                                <th>{{$cart_product->product->id}}</th>
                                <td>{{$cart_product->product->name}}</td>
                                <td>{{$cart_product->sugar_level}}</td>
                                <td>&#8369 {{$cart_product->price}}</td>
                                <td>{{$cart_product->quantity}}</td>
                              {{-- <td>@dd($cart_product)</td> --}}
                            </tr>

                            @empty

                            @endforelse

                            <!-- row 1 -->


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</x-panel>
