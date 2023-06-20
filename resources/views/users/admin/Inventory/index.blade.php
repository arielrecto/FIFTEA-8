<x-panel>
    <div class="p-4">

<div class="relative overflow-x-auto">
    <div class="w-full flex flex-row-reverse">
        <a href="{{route('admin.supply.create')}}">Add Supply</a>
    </div>
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                  name
                </th>
                <th scope="col" class="px-6 py-3">
                    unit value
                </th>
                <th scope="col" class="px-6 py-3">
                    unit
                </th>
                <th scope="col" class="px-6 py-3">
                   quantity
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $supplies as $supply)
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                   {{$supply->name}}
                </th>
                <td class="px-6 py-4">
                    {{$supply->unit_value}}
                </td>
                <td class="px-6 py-4">
                    {{$supply->unit}}
                </td>
                <td class="px-6 py-4">
                   {{$supply->quantity}}
                </td>
            </tr>
            @empty

            @endforelse

        </tbody>
    </table>
</div>

    </div>
</x-panel>
