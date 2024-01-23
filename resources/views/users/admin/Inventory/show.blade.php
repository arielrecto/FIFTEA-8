<x-panel>
    <div class="pt-8 px-4">
        <a href="{{ route('admin.supply.index') }}" class="rounded border border-gray-200 hover:bg-gray-200 px-4 py-1 mb-4 flex items-center w-fit text-gray-700 text-sm">
            <i class='bx bx-left-arrow-alt text-2xl mr-2'></i>
            back
        </a>
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
                <tr>
                    <td class="py-2 px-4 border-b border-r">2024-01-23</td>
                    <td class="py-2 px-4 border-b border-r">John Doe</td>
                    <td class="py-2 px-4 border-b border-r">+10</td>
                    <td class="py-2 px-4 border-b border-r">2024-02-23</td>
                    <td class="py-2 px-4 border-b">100</td>
                </tr>
            </tbody>
        </table>
    </div>
</x-panel>
