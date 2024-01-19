<x-print-layout>
    <div class="flex items-start justify-center p-5">
        <div class="w-full max-w-[1000px] flex flex-col space-y-4">
            <div id="head" class="w-full flex items-start justify-between">
                <a href="{{ route('admin.dashboard.index') }}"
                    class="flex items-center rounded border border-gray-200 px-4 py-2 w-fit text-sm hover:bg-gray-200 hover:text-gray-900 group">
                    <i class='bx bx-arrow-back text-xl mr-2 group-hover:text-gray-900'></i>
                    Back
                </a>
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
                    <h1 class="text-xl font-semibold">Sales Report</h1>
                    <p class="text-base">March 21, 2024</p>
                </div>
                <div class="flex justify-between mt-4 px-2">
                    <div>
                        <h1 class="text-lg font-semibold">Total Sales: ₱ {{ $totalSum }}</h1>
                    </div>
                    <div>
                        <h1 class="text-lg font-semibold">Total Transactions: {{ count($orders) }}</h1>
                    </div>
                </div>
            </div>
            <div class="max-w-full overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr class="text-sm">
                            <th class="py-2 px-4 border-b border-r border-gray-300">No.</th>
                            <th class="py-2 px-4 border-b border-r border-gray-300">Order No</th>
                            <th class="py-2 px-4 border-b border-r border-gray-300">Transaction No</th>
                            <th class="py-2 px-4 border-b border-r border-gray-300">Mode</th>
                            <th class="py-2 px-4 border-b border-r border-gray-300">Product</th>
                            <th class="py-2 px-4 border-b border-r border-gray-300">Quantity</th>
                            <th class="py-2 px-4 border-b">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="text-sm">
                                <td class="py-2 px-4 border-b border-r border-gray-300 text-center">1</td>
                                <td class="py-2 px-4 border-b border-r border-gray-300">{{$order->num_ref}}</td>
                                <td class="py-2 px-4 border-b border-r border-gray-300">{{$order->transaction->transaction_ref}}</td>
                                <td class="py-2 px-4 border-b border-r border-gray-300">{{$order->type}}</td>
                                <td class="py-2 px-4 border-b border-r border-gray-300">
                                    @foreach ($order->cart->products as $c_product)
                                        <h1>
                                            {{$c_product->product->name}}
                                        </h1>
                                    @endforeach
                                </td>
                                <td class="py-2 px-4 border-b border-r border-gray-300">{{count($order->cart->products)}}</td>
                                <td class="py-2 px-4 border-b">{{$order->total}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
