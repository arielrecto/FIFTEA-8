<x-panel>
    <div class="pt-8 px-4">

        <div class="w-full flex items-start justify-center">
            <form action="{{ route('admin.stock-limit.update', $limit->id) }}" method="POST">
                @csrf
                <a href="{{ route('admin.supply.index') }}" class="rounded border border-gray-200 hover:bg-gray-200 mb-4 px-4 py-1 flex items-center w-fit text-gray-700 text-sm">
                    <i class='bx bx-left-arrow-alt text-2xl mr-2'></i>
                    back
                </a>
                <div class="mb-8 w-[700px]">
                    <h1 class="font-semibold text-xl ">Update the Stock Status Limits</h1>
                    <span class="text-sm text-gray-500 leading-none ">The value of 'Low' and 'High' in between stock statuses determines status of a stock in the inventory according to quantity.</span>
                </div>
                <div class="flex items-end space-x-1 h-8 w-[700px] ">
                    <div class="h-full w-full bg-red-200 flex items-center justify-center rounded">
                        <span class="text-red-600 text-sm">Low Stock</span>
                    </div>
                    <div class="flex flex-col space-y-1">
                        <span class="text-sm text-center font-semibold">Low</span>
                        <input type="number" name="low" value="{{ $limit->low }}" class="h-8 w-20 rounded border border-gray-200">
                    </div>
                    <div class="h-full w-full bg-green-200 flex items-center justify-center rounded">
                        <span class="text-green-600 text-sm">Normal Stock</span>
                    </div>
                    <div class="flex flex-col space-y-1">
                        <span class="text-sm text-center font-semibold">High</span>
                        <input type="number" name="high" value="{{ $limit->high }}" class="h-8 w-20 rounded border border-gray-200">
                    </div>
                    <div class="h-full w-full bg-yellow-200  flex items-center justify-center rounded">
                        <span class="text-yellow-600 text-sm">Over Stock</span>
                    </div>
                </div>
                <div class="mt-4">
                    <button class="px-4 py-2 rounded text-white bg-blue-600 hover:bg-blue-700 text-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-panel>
