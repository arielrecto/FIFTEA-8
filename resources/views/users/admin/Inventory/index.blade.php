<x-panel>
    <section class="w-full flex flex-col items-start p-4 pt-6 space-y-2">
        <div class="w-full flex items-center justify-between py-2">
            <h1 class="font-medium text-2xl ">LIST OF SUPPLIES</h1>
            <div class="">
                <a href="{{ route('admin.supply.create') }}"
                    class="flex items-center px-4 py-2 rounded text-white bg-sbgreen text-sm">
                    <i class='bx bx-list-plus text-xl mr-2'></i>
                    add supply
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
                            <th class="poppins text-white text-sm border border-gray-400 px-4 py-2 text-center">Action
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
                                        {{ $supply->quantity }}</td>

                                    <td class="poppins text-sm border border-gray-400 px-4 py-2 ">
                                        <div class="flex space-x-2">
                                           <form action="{{route('admin.supply.destroy', ['supply' => $supply->id])}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button>
                                                <i
                                                class='bx bx-trash text-red-500 text-xl rounded hover:bg-red-50 cursor-pointer py-1 px-2'></i>
                                            </button>
                                           </form>


                                            {{-- <div>
                                            <label for="my-modal" class="p-0 m-0">
                                                <i class='bx bx-edit text-blue-500 text-xl cursor-pointer rounded hover:bg-blue-50 py-1 px-2'></i>
                                            </label>
                                            <input type="checkbox" id="my-modal" class="modal-toggle" />
                                            <div class="modal">
                                                <div class="modal-box">

                                                    <div>
                                                        dito yung mg add ons
                                                    </div>

                                                    <div class="modal-action">
                                                        <label for="my-modal" class="btn">Yay!</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
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
