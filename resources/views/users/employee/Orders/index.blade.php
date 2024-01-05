@php
    use App\Enums\OrderStatus;
@endphp

<x-employee-panel>
    <div class="p-5 flex flex-col gap-5" x-data="payment">

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
        <div class="w-full flex items-center justify-between py-2 bg-sbgreen px-4 rounded ">
            <h1 class="text-xl text-center font-bold text-white">
                Online Orders
            </h1>
            <div>
                <a href="{{ route('employee.order.index') }}" class="btn btn-xs btn-primary">
                    Pending
                </a>
                <a href="{{ route('employee.order.index') }}?status={{ OrderStatus::PROCESSED->value }}"
                    class="btn btn-xs btn-secondary">
                    Processed
                </a>
                <a href="{{ route('employee.order.index') }}?status={{ OrderStatus::DELIVERY->value }}"
                    class="btn btn-xs btn-accent">
                    Delivery
                </a>
                <a href="{{ route('employee.order.index') }}?status={{ OrderStatus::DONE->value }}"
                    class="btn btn-xs btn-base">
                    Done
                </a>
            </div>
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
                        <th>
                            Details
                        </th>
                        @if (app('request')->input('status') === null)
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        @endif
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
                            @php
                                $payment = json_encode($order->payment);
                            @endphp
                            <td class="px-6 py-4">
                                <a href="{{ route('employee.order.show', ['order' => $order->id]) }}"
                                    class="btn btn-ghost">
                                    <i class="fi fi-rr-eye"></i>
                                </a>
                                {{-- <button class="btn btn-ghost"
                                    @click="openPaymentData({{ $payment }})">view</button> --}}
                            </td>


                            @if (app('request')->input('status') === null)
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <form action="{{ route('employee.order.approved', ['id' => $order->id]) }}"
                                            method="post">
                                            @csrf
                                            <button>
                                                <box-icon name='check'></box-icon>
                                            </button>
                                        </form>
                                        <form action="{{ route('employee.order.destroy', ['order' => $order->id]) }}"
                                            method="post">
                                            @method('delete')
                                            @csrf
                                            <button>
                                                <box-icon name='x'></box-icon>
                                            </button>
                                        </form>
                                    </div>

                                </td>
                            @endif
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        <template x-if="paymentData !== null">
            <div
                class="w-full bg-gray-100 shadow-lg rounded-lg h-96 absolute max-w-screen-md top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex flex-col gap-2 p-2">
                <h1 class="text-center text-lg capitalize text-semibold">
                    payment credential
                </h1>
                <div class="w-full flex gap-2">
                    <div class="w-1/3">
                        <img :src="paymentData.image"alt="" srcset="">
                    </div>
                    <div class="flex-grow flex flex-col gap-2">
                        <h1>customer: <span class="font-bold" x-text="paymentData.user.name"></span></h1>
                        <h1>gcash ref #: <span class="font-bold" x-text="paymentData.payment_ref"></span></h1>
                        <h1>Amount: <span class="font-bold" x-text="paymentData.amount"></span></h1>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button class="btn btn-error" @click="paymentData = null">Close</button>
                </div>
            </div>
        </template>

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
