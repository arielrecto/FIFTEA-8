@php
    use App\Enums\OrderStatus;
@endphp

<x-app-layout>

    <x-user-header />

    <section class="bg-gray-50 h-auto min-h-screen text-gray-700">
        <div class="max-w-[1300px] mx-auto px-4 pt-24 pb-4">
            <div class="flex items-start justify-between space-x-6">
                <div class="w-full flex flex-col">

                    <div class="w-full flex flex-col-reverse md:flex-row items-start md:space-x-4 py-5">

                        <div
                            class="w-full flex flex-col md:flex-row space-y-4 md:space-y-0 md:items-center md:justify-between border border-gray-400">
                            <h1
                                class="w-full h-full border-b md:border-b-0 md:border-r border-gray-400 p-4 flex flex-col md:items-center ">
                                <span class="text-base font-semibold">Order Number</span>
                                <span>{{ $order->num_ref }}</span>
                            </h1>
                            <div
                                class="w-full h-full border-b md:border-b-0 md:border-r border-gray-400 p-4 flex flex-col md:items-center">
                                <span class="text-base font-semibold">Transaction Number</span>
                                <span>{{ $order->transaction->transaction_ref }}</span>
                            </div>
                            <div class="w-full h-full p-4 flex flex-col md:items-center">
                                <span class="text-base font-semibold">Total</span>
                                <span> &#8369 {{ $order->total }}</span>
                            </div>
                        </div>

                        <ul class="steps w-full mb-8 md:mb-0">
                            <li class="step step-primary">
                                <span class="py-1 px-2 rounded text-white bg-red-500">Pending</span>
                            </li>
                            <li
                                class="step {{ ($order->status === OrderStatus::PROCESSED->value) |
                                ($order->status === OrderStatus::DELIVERY->value) |
                                ($order->status === OrderStatus::DONE->value)
                                    ? 'step-primary'
                                    : ' ' }}">
                                <span class="py-1 px-2 rounded text-white bg-blue-500">Processed</span>
                            </li>
                            <li
                                class="step {{ ($order->status === OrderStatus::DELIVERY->value) | ($order->status === OrderStatus::DONE->value)
                                    ? 'step-primary'
                                    : ' ' }}">
                                <span class="py-1 px-2 rounded text-white bg-orange-500">Delivery</span>
                            </li>
                            <li class="step {{ $order->status === OrderStatus::DONE->value ? 'step-primary' : ' ' }}">
                                <span class="py-1 px-2 rounded text-white bg-green-500">Done</span>
                            </li>
                        </ul>
                    </div>

                    <div class="w-full flex flex-col gap-2">
                        <div class="w-full flex flex-col gap-2">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full rounded border border-gray-300 ">
                                    <!-- head -->
                                    <thead>
                                        <tr class="border border-gray-300">
                                            <th class="border p-2"></th>
                                            <th class="border p-2">Name</th>
                                            <th class="border p-2">Quantity</th>
                                            <th class="border p-2">Size</th>
                                            <th class="border p-2">Extras</th>
                                            <th class="border p-2">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- row 1 -->
                                        @forelse ($order->cart->products as $cart_product)
                                            <tr class="bg-white border border-gray-300">
                                                <th class="border p-2">1</th>
                                                <td class="border p-2">{{ $cart_product->product->name }}</td>
                                                <td class="border p-2">{{ $cart_product->quantity }}</td>
                                                @php
                                                    $size = json_decode($cart_product->size);
                                                @endphp
                                                @if ($size !== null)
                                                    <td class="border p-2">{{ $size->name }}</td>
                                                @endif
                                                @php
                                                    $extras = json_decode($cart_product->extras);
                                                @endphp

                                                @if (!empty($extras))
                                                    <td class="border px-4 py-2">
                                                        @foreach ($extras as $extra)
                                                            <span>
                                                                {{ $extra->name }} (&#8369;
                                                                {{ $extra->pivot->price }})
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                @else
                                                    <td class="border px-4 py-2">No Extras </td>
                                                @endif
                                                {{-- <td class="border p-2">{{$cart_product->extras}}</td> --}}
                                                <td class="border p-2">{{ $cart_product->total }}</td>
                                            </tr>
                                        @empty
                                            <tr class="bg-white border border-gray-300">
                                                <td class="border p-2">No product</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    @if ($order->status === OrderStatus::DONE->value)
                        <div class="flex items-center justify-start py-4">
                            <a href="{{ route('client.feedbacks.create', ['cart' => $order->cart->id]) }}"
                                class="text-sm bg-blue-700 text-white flex items-center rounded px-4 py-2 ">
                                <i class='bx bx-message-detail text-xl mr-2'></i>
                                Send a Feedback
                            </a>
                        </div>
                    @endif


                </div>


            </div>
        </div>
    </section>
</x-app-layout>
