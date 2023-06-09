<div class="flex flex-col w-full py-10" x-data="sideBar">
    <ul class="px-2">
        <a href="{{route('admin.dashboard.index')}}" class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200">
            <i class='bx bxs-dashboard text-xl'></i>
            <p class="text-lg group-hover:font-medium">Dashboard</p>
        </a>
        <a href="{{route('admin.products.create')}}" class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
            <i class='bx bx-list-ul text-xl'></i>
            <p class="text-lg group-hover:font-medium">Product</p>
        </a>
    </ul>
</div>


