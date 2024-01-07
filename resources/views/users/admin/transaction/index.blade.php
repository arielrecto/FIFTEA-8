<x-panel>
    <section class="md:p-5 py-5 flx flex-col space-y-5">
        <div class="flex flex-col-reverse md:flex-row space-y-4 md:space-y-0 items-start md:space-x-4">
            <div class="w-full md:w-3/4 py-4 md:px-2">
                <table class="min-w-full bg-white border border-gray-200">
                    <!-- Head -->
                    <thead>
                        <tr>
                            <th class="px-4 py-2 bg-gray-100 text-left">ID</th>
                            <th class="px-4 py-2 bg-gray-100 text-left">Order Id</th>
                            <th class="px-4 py-2 bg-gray-100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows -->
                        @forelse ($transactions as $transaction)
                        <tr>
                            <td class="px-4 text-sm py-2">{{$transaction->transaction_ref}}</td>
                            <td class="px-4 text-sm py-2">{{$transaction->order->num_ref}}</td>
                            <td class="px-4 py-2">
                                <a href="{{route('admin.transaction.show', ['transaction' => $transaction->id])}}" class="text-blue-500 hover:underline">
                                    <button class="px-2 py-1 bg-blue-200 hover:bg-blue-300 rounded">
                                        <i class="fi fi-rr-eye"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-4 py-2 text-red-600 text-left">No Item</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="w-full md:w-1/4 flex flex-col justify-center">
                <div class="py-4 md:p-4 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg flex flex-col items-center">
                        <i class='bx bx-cart-alt text-sbgreen text-5xl'></i>
                        <h2 class="title-font font-medium text-3xl text-gray-900">{{$totalOnline}}</h2>
                        <p class="leading-relaxed">Online Orders</p>
                    </div>
                </div>
                <div class="py-4 md:p-4 w-full">
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
