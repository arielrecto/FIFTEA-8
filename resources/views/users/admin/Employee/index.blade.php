<x-panel>
    <div class="md:p-4 pt-8 flex flex-col gap-4">

        <div class="w-full flex flex-row-reverse">
            <a href="{{ route('admin.employee.create') }}" class="flex items-center px-4 py-2 rounded text-white bg-sbgreen text-sm">
                <i class='bx bx-list-plus text-xl mr-2'></i>
                add employee
            </a>
        </div>

        <div class="w-full flex flex-col">
            <div class="w-full overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300 bg-white shadow rounded-md">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="poppins  text-sm border border-gray-300 px-4 py-2 text-center">NAME</th>
                            <th class="poppins text-sm border border-gray-300 px-4 py-2 text-center">EMAIL</th>
                            <th class="poppins text-sm border border-gray-300 px-4 py-2 text-center">ROLE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($employees->count())
                            @foreach($employees as $employee)
                            <tr>
                                <td class="poppins text-sm border border-gray-300 px-4 py-2 text-left">{{$employee->name}}</td>
                                <td class="poppins text-sm border border-gray-300 px-4 py-2 text-center"> {{$employee->email}}</td>
                                <td class="poppins text-sm border border-gray-300 px-4 py-2 text-center">{{$employee->roles()->first()->name}}</td>
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

    </div>
    </div>
</x-employee-panel>
