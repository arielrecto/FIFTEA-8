<x-panel>
    <div class="pt-8 px-4" x-data="{ toggle: false }">
        <div class="flex justify-between">
            <a href="{{ route('admin.supply.index') }}"
                class="rounded border border-gray-200 hover:bg-gray-200 px-4 py-1 mb-4 flex items-center w-fit text-gray-700 text-sm">
                <i class='bx bx-left-arrow-alt text-2xl mr-2'></i>
                back
            </a>
            <button class="h-fit px-4 py-2 text-white text-sm rounded bg-green-700" @click="toggle = !toggle" x-text="!toggle ? 'Add' : 'X'"></button>
        </div>
        <form method="POST" action="{{ route('admin.supply.add.stock', ['supply' => $supply->id]) }}"
            class="flex flex-col gap-2" x-show="toggle" x-transition.duration.700ms x-cloak>
            <h1 class="font-bold text-xl">Add Stocks {{ $supply->name }}</h1>
            @csrf
            {{-- <div class="flex flex-col gap-2">
                <label for="">Date Added</label>
                <input type="date" name="date_added">
            </div> --}}
            <div class="flex flex-col gap-2">
                <label for="">Expiration Date</label>
                <input type="date" name="expiration_date">
            </div>
            <div class="flex flex-col gap-2">
                <label for="">Quantity</label>
                <input type="number" name="quantity">
            </div>
            <button class="px-4 py-2 text-white text-sm rounded bg-green-700">Submit</button>
        </form>


        <div class="mb-2">
            <h1 class="text-2xl font-semibold">History</h1>
        </div>
        <table class="min-w-full bg-white border border-gray-300 shadow-md rounded overflow-hidden">
            <thead class="bg-green-700 text-white">
                <tr>
                    <th class="py-2 px-4 border-b border-r">Date Added</th>
                    <th class="py-2 px-4 border-b border-r">Adjusted By</th>
                    <th class="py-2 px-4 border-b border-r">Adjustment</th>
                    <th class="py-2 px-4 border-b border-r">Expiry Date</th>
                    <th class="py-2 px-4 border-b">Quantity</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($stocks as $stock)
                    <tr>
                        <td class="py-2 px-4 border-b border-r">{{ date('F d, Y', strtotime($stock->created_at)) }}</td>
                        <td class="py-2 px-4 border-b border-r">{{ $stock->adjusted_by }}</td>
                        <td class="py-2 px-4 border-b border-r">+{{ $stock->adjustment_quantity }} </td>
                        <td class="py-2 px-4 border-b border-r">{{ date('F d, Y', strtotime($stock->expiration_date)) }}
                        </td>
                        <td class="py-2 px-4 border-b">{{ $stock->quantity }}</td>
                    </tr>
                @empty
                    <tr>
                        <td>No Supply History</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</x-panel>
