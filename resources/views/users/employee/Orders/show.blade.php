@php
    use App\Enums\OrderStatus;
@endphp
<x-employee-panel>
    <div class="w-full h-full md:p-5 py-5 flex flex-col gap-5" x-data="payment">

        @if (Session::has('message'))
            <div class="alert alert-success animate-pulse" id="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ Session::get('message') }}</span>
            </div>
        @endif

        <div class="w-full flex items-center justify-start py-2 bg-sbgreen px-4 rounded">
            <h1 class="text-xl text-center font-bold text-white">
                Orders Details
            </h1>
        </div>

        <div class="w-full h-full flex flex-col space-y-2">

            <div
                class="w-full py-2 border-b border-gray-300 flex flex-col md:flex-row space-y-2 md:space-y-0 md:justify-between md:items-center">
                <h1 class="flex items-center text-base gap-4">
                    <span class="">Order Number:</span>
                    <span class="font-bold">
                        {{ $order->num_ref }}
                    </span>
                </h1>
                <h1 class="flex items-center text-base gap-4">
                    <span class="">Date:</span>
                    <span class="font-bold">
                        {{ date('F m, Y', strtotime($order->created_at)) }}
                    </span>
                </h1>
            </div>

            <div class="flex flex-col">
                <span class="py-2 mb-2 w-full border-b border-gray-300 text-sm font-semibold">PAYMENT DETAILS</span>
                <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 border-b border-gray-200">
                    <div class="w-full md:w-80 h-auto mb-1 border-b border-gray-200">
                        <a href="{{ route('media.payment', ['name' => $order->payment->image]) }}" data-baguettebox>
                            <img src="{{ route('media.payment', ['name' => $order->payment->image]) }}" alt=""
                                class="object object-center h-full w-full cursor-pointer">
                        </a>
                    </div>
                    <div
                        class="w-full h-full flex flex-col md:items-center gap-2 mb-1 border-b md:border-0 border-gray-200">
                        <h1 class="font-semibold">Referrence Number</h1>
                        <span>{{ $order->payment->payment_ref }}</span>
                    </div>
                    <div
                        class="w-full h-full flex md:items-center flex-col gap-2 mb-1 border-b md:border-0 border-gray-200">
                        <h1 class="font-semibold">Amount</h1>
                        <span>&#8369 {{ $order->payment->amount }}</span>
                    </div>
                    <div class="w-full flex flex-col md:items-center mb-1 border-b md:border-0 border-gray-200">
                        <span class="font-semibold">Total</span>
                        <span>{{ $order->total }}</span>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <h1 class="text-2xl font-bold">
                    Products
                </h1>
                <div class="overflow-x-auto w-full bg-white">
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
                            @forelse ($order->cart->products as $cart_product)
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

                                    @if(!empty($extra))

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
                <div class="flex justify-end items-center">
                    @if ($order->status === OrderStatus::PROCESSED->value)
                        <a href="{{ route('employee.order.show', ['order' => $order->id]) }}?status={{ OrderStatus::DELIVERY->value }}&message=Order is on delivery"
                            class="btn btn-accent btn-sm">
                            Deliver
                        </a>
                    @endif
                    @if ($order->status === OrderStatus::DELIVERY->value)
                        <a href="{{ route('employee.order.show', ['order' => $order->id]) }}?status={{ OrderStatus::DONE->value }}&message=Order is Done!"
                            class="btn btn-accent btn-sm">
                            Done
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </div>

    @push('js')
        <script>
            setTimeout(() => {
                document.getElementById('alert').remove();
            }, 3000);
        </script>
        {{-- <script>
            function payment() {
                return {
                    paymentData: null,
                    openPaymentData(data) {
                        console.log(data)
                        this.paymentData = data
                    }
                }
            }
        </script> --}}
    @endpush
</x-employee-panel>
