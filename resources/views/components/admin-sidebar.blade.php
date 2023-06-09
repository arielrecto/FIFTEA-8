<div class="h-auto min-h-screen flex flex-col w-full py-10 border-r border-gray-300" x-data="sideBar">
    <ul class="flex flex-col space-y-1 px-3">
        <a href="{{route('admin.dashboard.index')}}" class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200">
            <i class='bx bxs-dashboard text-xl'></i>
            <p class="text-lg group-hover:font-medium">Dashboard</p>
        </a>
        <a href="{{route('admin.products.create')}}" class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
            <i class='bx bx-list-ul text-xl'></i>
            <p class="text-lg group-hover:font-medium">Product</p>
        </a>
        <a href="#" class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
            <i class='bx bx-notepad text-xl'></i>
            <p class="text-lg group-hover:font-medium">Inventory</p>
        </a>
        <a href="#" class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
            <i class='bx bxs-user-detail text-xl'></i>
            <p class="text-lg group-hover:font-medium">Employee</p>
        </a>
        <a href="#" class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
            <i class='bx bx-food-menu text-xl'></i>
            <p class="text-lg group-hover:font-medium">Transactiosn</p>
        </a>
    </ul>
</div>


