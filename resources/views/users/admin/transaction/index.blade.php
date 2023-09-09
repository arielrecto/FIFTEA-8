<x-panel>
    <section class="p-5 flx flex-col space-y-5">
        <div class="flex flex-wrap w-full justify-center">
            <div class="w-1/3 h-36 bg-white shadow-lg mx-auto">
                <h1>
                    online
                </h1>

                <span>
                    {{ $totalOnline }}
                </span>
            </div>
            <div class="w-1/3 h-36 bg-white shadow-lg mx-auto">
                <h1>
                    walk in
                </h1>

                <span>
                    {{ $totalWalkin }}
                </span>
            </div>
        </div>
        <div>
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Order Id</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->

                        @forelse ($transactions as $transaction)
                        <tr>
                            <th>{{$transaction->transaction_ref}}</th>
                            <td>{{$transaction->order->num_ref}}</td>
                            <td><a href="http://"><button class="btn">View</button></a></td>
                        </tr>
                        @empty
                        <tr colspan="5">
                            <th>
                                No Item
                            </th>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-panel>
