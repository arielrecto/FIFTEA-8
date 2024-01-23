<x-panel>
    <section class="w-full flex flex-col items-start md:p-4 pt-6 space-y-2">
        {{-- <div class="w-full flex items-center justify-between py-2">
            <h1 class="font-medium text-2xl ">SUPPLIES</h1>
            <div class="">
                <a href="{{ route('admin.supply.create') }}"
                    class="flex items-center px-4 py-2 rounded text-white bg-sbgreen text-sm">
                    <i class='bx bx-plus text-lg mr-2 text-white'></i>
                    Add Supply
                </a>
            </div>
        </div> --}}

        <div class="w-full flex items-center justify-between py-2 px-4  bg-sblight rounded">
            <h1 class="font-medium text-white text-xl">SUPPLIES</h1>
            <div class="flex items-center space-x-4">
                <form action="{{ route('admin.supply.index') }}" class="flex items-center space-x-3" method="GET">
                    <input type="text"
                        class="text-sm px-4 py-2 rounded bg-inherit border border-gray-200 placeholder:text-white"
                        name="filter" placeholder="Search here..">
                    <button class="px-4 py-2 rounded text-sm bg-white text-sbgreen flex items-center">
                        <i class='bx bx-search-alt-2 text-base text-sbgreen mr-2'></i>
                        Search</button>
                </form>
                <a href="{{ route('admin.supply.create') }}"
                    class="flex items-center px-4 py-2 bg-white rounded text-sbgreen text-sm">
                    <i class='bx bx-plus text-base mr-2 text-sbgreen'></i>
                    Add Supply
                </a>
            </div>
        </div>

        <div class="w-full flex flex-col">
            <div class="w-full overflow-x-auto">
                <table class="w-full border-collapse border border-gray-400 ">
                    <thead>
                        <tr class="bg-sblight ">
                            <th class="poppins text-white text-sm border border-gray-400 px-4 py-2 text-center">NAME
                            </th>
                            <th class="poppins text-white text-sm border border-gray-400 px-4 py-2 text-center">UNIT
                                VALUE</th>
                            <th class="poppins text-white text-sm border border-gray-400 px-4 py-2 text-center">UNIT
                            </th>
                            <th class="poppins text-white text-sm border border-gray-400 px-4 py-2 text-center">SIZE
                            </th>
                            <th class="poppins text-white text-sm border border-gray-400 px-4 py-2 text-center">QUANTITY
                            </th>
                            {{-- <th class="poppins text-white text-sm border border-gray-400 px-4 py-2 text-center">EXPIRY
                                DATE
                            </th> --}}
                            <th class="poppins text-white text-sm border border-gray-400 px-4 py-2 text-center">STOCK
                                STATUS
                            </th>
                            <th class="poppins text-white text-sm border border-gray-400 px-4 py-2 text-center">ACTIONS
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($supplies->count())
                            @foreach ($supplies as $supply)
                                <tr>
                                    <td class="poppins text-sm border border-gray-400 px-4 py-2 text-left">
                                        {{ $supply->name }}</td>
                                    <td class="poppins text-sm border border-gray-400 px-4 py-2 text-center">
                                        {{ $supply->unit_value }}
                                    </td>
                                    <td class="poppins text-sm border border-gray-400 px-4 py-2 text-center">
                                        {{ $supply->unit }}
                                    </td>
                                    <td class="poppins text-sm border border-gray-400 px-4 py-2 text-center">
                                        {{ $supply->size }}</td>
                                    <td class="poppins text-sm border border-gray-400 px-4 py-2 text-center">
                                        {{ $supply->quantity }}
                                    </td>

                                    {{-- <td class="poppins text-sm border border-gray-400 px-4 py-2 text-center">
                                        @php
                                            $formattedDate = date('M. j, Y', strtotime($supply->expiration_date));
                                        @endphp
                                        {{ $formattedDate }}
                                    </td> --}}

                                    <td class="poppins text-sm border border-gray-400 px-4 py-2 text-center">
                                        @if ($supply->quantity < 10)
                                            <span
                                                class="bg-red-200 text-red-500 text-xs px-3 py-2 ml-2 rounded">Critical
                                                Stock</span>
                                        @elseif ($supply->quantity > 10 && $supply->quantity < 20)
                                            <span
                                                class="bg-orange-200 text-Orange-500 text-xs px-3 py-2 ml-2 rounded">Low
                                                Stock</span>
                                        @elseif ($supply->quantity > 20 && $supply->quantity < 100)
                                            <span
                                                class="bg-yellow-200 text-yellow-500 text-xs px-3 py-2 ml-2 rounded">Normal
                                                Stock</span>
                                        @elseif ($supply->quantity > 100)
                                            <span
                                                class="bg-green-200 text-green-500 text-xs px-3 py-2 ml-2 rounded">Over
                                                Stock</span>
                                        @elseif ($supply->quantity == 0)
                                            <span class="bg-gray-200 text-Gray-500 text-xs px-3 py-2 ml-2 rounded">No
                                                Stock</span>
                                        @endif
                                    </td>


                                    <td class="poppins text-sm border border-gray-400 px-4 py-2 ">
                                        <div class="flex items-center justify-center space-x-2">
                                            <form
                                                action="{{ route('admin.supply.destroy', ['supply' => $supply->id]) }}"
                                                method="post">
                                                @method('delete')
                                                @csrf
                                                <button>
                                                    <i
                                                        class='bx bx-trash text-red-500 text-xl rounded hover:bg-red-50 cursor-pointer py-1 px-2'></i>
                                                </button>
                                            </form>

                                            <a href="{{ route('admin.supply.edit', ['supply' => $supply->id]) }}">
                                                <i class='bx bxs-edit-alt text-lg text-blue-600'></i>
                                            </a>

                                            <a href="{{ route('admin.supply.show', ['supply' => $supply->id]) }}">
                                                <i
                                                    class='bx bx-show text-xl text-green-600 rounded hover:bg-green-50 cursor-pointer py-1 px-2'></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="4">
                                <p class="text-red-500 text-center p-2">No Data</p>
                            </td>
                        @endif
                    </tbody>
                </table>
                <div class="py-4">
                    {{-- {{ $products->links() }} --}}
                </div>
            </div>
        </div>
    </section>
</x-panel>
