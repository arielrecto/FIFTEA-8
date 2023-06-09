<x-employee-panel>
    <div class="p-5 flex flex-col gap-5">

        @if (Session::has('message'))
            <div class="alert alert-success animate-pulse" id="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{Session::get('message')}}</span>
            </div>
        @endif
        <div class="w-full">
            <h1 class="text-xl text-center font-bold">
                Orders - Online
            </h1>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 rounded-t-lg">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Order No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($orders as $order)
                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                {{ $order->num_ref }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $order->user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $order->cart->products()->count() }}
                            </td>
                            <td class="px-6 py-4">
                                ₱ {{ $order->total }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <form action="{{route('employee.order.approved', ['id' => $order->id])}}" method="post">
                                        @csrf
                                        <button>
                                            <box-icon name='check'></box-icon>
                                        </button>
                                    </form>
                                    <button>
                                        <box-icon name='x'></box-icon>
                                    </button>
                                </div>

                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    @push('js')
        <script>
            setTimeout(() => {
                document.getElementById('alert').remove();
            }, 3000);
        </script>
    @endpush
</x-employee-panel>
