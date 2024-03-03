<x-print-layout>
    <div class="flex items-start justify-center p-5">
        <div class="w-full max-w-[1000px] flex flex-col space-y-4">
            <div id="head" class="w-full flex items-start justify-between">
                <a href="{{ route('products') }}"
                    class="flex items-center rounded border border-gray-200 px-4 py-2 w-fit text-sm hover:bg-gray-200 hover:text-gray-900 group">
                    <i class='bx bx-arrow-back text-xl mr-2 group-hover:text-gray-900'></i>
                    Back
                </a>

                {{-- <form action="{{ route('admin.sales.preview') }}" method="get" class="flex items-end space-x-4">
                    <input type="hidden" name="filter" value="range">
                    <div class="flex flex-col ">
                        <label for="" class="text-xs font-semibold">Start Date</label>
                        <input type="date" name="start_date"
                            class="px-3 py-1 border border-gray-300 rounded text-sm">
                    </div>
                    <div class="flex flex-col ">
                        <label for="" class="text-xs font-semibold">Start Date</label>
                        <input type="date" name="end_date" class="px-3 py-1 border border-gray-300 rounded text-sm">
                    </div>
                    <button class="py-1 px-3 text-sm bg-gray-700 rounded text-white">Filter</button>
                </form> --}}
                <button onclick="printData()"
                    class="hide-in-print flex items-center rounded border border-gray-200 px-4 py-2 w-fit text-sm hover:bg-gray-200 hover:text-gray-900 group">
                    <i class='bx bx-printer text-xl group-hover:text-gray-900'></i>

                </button>
            </div>
            <div class="flex items-center justify-start space-x-6">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-28 h-28">
                </div>
                <div class="flex flex-col items-start justify-start">
                    <p class="text-2xl font-semibold">Fif'Tea-8</p>
                    <span class="text-sm">Brgy. San Nicolas III, Bacoor City</span>
                    <span class="text-sm">shop@fiftea8.com</span>
                    <span class="text-sm">09123456789</span>
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between bg-gray-500 p-2 text-white">
                    <h1 class="text-xl font-semibold">Receipt</h1>
                    <p class="text-base">{{ date('F d, Y', strtotime(now())) }}</p>
                </div>
                <div class="flex justify-between mt-4 px-2">
                    <div>
                        <h1 class="text-lg font-semibold">Total Sales: ₱ {{ $order->total }}</h1>
                    </div>
                    <div>
                        <h1 class="text-lg font-semibold">Order Number {{ $order->num_ref }}</h1>
                    </div>
                </div>
            </div>
            <div class="max-w-full overflow-x-auto">

                <h1 class="text-lg font-semibold">Products</h1>
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
            <div class="prepared-by w-fit pt-20">
                <div class="flex flex-col space-y-2">
                    <p class="text-sm">Order By:</p>
                    <p class="w-fullt text-center">{{ Auth::user()->name }}</p>
                    {{-- <p class="px-12 text-sm  border-t border-gray-600">Name and Signature</p> --}}
                </div>
            </div>

        </div>
    </div>
    <script>
        function printData() {
            const head = document.getElementById('head');
            head.style.display = 'none';
            window.print();
            head.style.display = 'flex';
        }
    </script>
</x-print-layout>
