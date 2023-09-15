<x-panel>
    <section class="p-5 flx flex-col space-y-5">
        <div class="flex items-start space-x-4">
            <div class="w-3/4 py-4 px-2">
                <table class="min-w-full bg-white shadow-lg rounded-sm border border-gray-200">
                    <!-- Head -->
                    <thead>
                        <tr>
                            <th class="px-4 py-2 bg-gray-100">ID</th>
                            <th class="px-4 py-2 bg-gray-100">Order Id</th>
                            <th class="px-4 py-2 bg-gray-100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows -->
                        @forelse ($transactions as $transaction)
                        <tr>
                            <td class="px-4 py-2">{{$transaction->transaction_ref}}</td>
                            <td class="px-4 py-2">{{$transaction->order->num_ref}}</td>
                            <td class="px-4 py-2">
                                <a href="#" class="text-blue-500 hover:underline">
                                    <button class="px-2 py-1 bg-blue-200 hover:bg-blue-300 rounded">View</button>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-4 py-2 text-red-600 text-center">No Item</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="w-1/4 flex flex-col justify-center">
                <div class="p-4 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg flex flex-col items-center">
                        <i class='bx bx-cart-alt text-sbgreen text-5xl'></i>
                        <h2 class="title-font font-medium text-3xl text-gray-900">{{$totalOnline}}</h2>
                        <p class="leading-relaxed">Online Orders</p>
                    </div>
                </div>
                <div class="p-4 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg flex flex-col items-center">
                        <i class='bx bx-store text-sbgreen text-5xl'></i>
                        <h2 class="title-font font-medium text-3xl text-gray-900">{{$totalWalkin}}</h2>
                        <p class="leading-relaxed">Walk-in Orders</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-panel>
