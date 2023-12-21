<div class="h-auto min-h-screen flex flex-col w-full py-8 border-r border-gray-300 pt-24">
    <ul class="flex flex-col space-y-1 px-3">
        {{-- <a href="{{route('employee.dashboard.index')}}" class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200">
            <i class='bx bxs-dashboard text-xl'></i>
            <p class="text-lg ">Dashboard</p>
        </a> --}}
        <a href="{{route('employee.order.index')}}" class="w-full flex justify-between items-center rounded-md px-4 py-2 group hover:bg-gray-200 cursor-pointer">
            <div class="flex space-x-2 items-center">
                <i class='bx bxs-shopping-bag text-xl'></i>
                <p class="text-lg ">Online Orders</p>
            </div>
        </a>
        <a href="{{route('employee.pos.index')}}" class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
            <i class='bx bx-notepad text-xl'></i>
            <p class="text-lg ">Point Of Sale</p>
        </a>
    </ul>
</div>

