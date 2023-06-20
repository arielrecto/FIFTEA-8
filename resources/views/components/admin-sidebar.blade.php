<div class="h-auto min-h-screen flex flex-col w-full py-8 border-r border-gray-300">
    <ul class="flex flex-col space-y-1 px-3">
        <a href="{{route('admin.dashboard.index')}}" class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200">
            <i class='bx bxs-dashboard text-xl'></i>
            <p class="text-lg ">Dashboard</p>
        </a>
        <a id="product" class="w-full flex justify-between items-center rounded-md px-4 py-2 group hover:bg-gray-200 cursor-pointer">
            <div class="flex space-x-2 items-center">
                <i class='bx bxs-shopping-bag text-xl'></i>
                <p class="text-lg ">Product</p>
            </div>
            <i class='bx bx-chevron-down text-xl'></i>
        </a>
        <div id="productLinks" class="flex flex-col hidden px-2 border-t border-gray-300 py-1">
            <a href="{{route('admin.products.create')}}" class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
                <i class='bx bx-plus-circle text-xl'></i>
                <p class="text-base ">Add New</p>
            </a>
            <a href="{{route('admin.products.index')}}" class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
                <i class='bx bx-list-ul text-xl'></i>
                <p class="text-base ">List</p>
            </a>
        </div>
        <a href="#" class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
            <i class='bx bx-notepad text-xl'></i>
            <p class="text-lg ">Inventory</p>
        </a>
        <a href="#" class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
            <i class='bx bxs-user-detail text-xl'></i>
            <p class="text-lg ">Employee</p>
        </a>
        <a href="#" class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
            <i class='bx bx-food-menu text-xl'></i>
            <p class="text-lg ">Transactiosn</p>
        </a>
    </ul>
</div>


<script>
    openProductLinks();

    function openProductLinks() {
        const product = document.getElementById('product');
        const links = document.getElementById('productLinks');

        product.addEventListener('click', () => {
            if (links.classList.contains('hidden')) {
                links.classList.remove('hidden');
                product.querySelector('.bx-chevron-down').classList.add('rotate-180');
            } else {
                links.classList.add('hidden');
                product.querySelector('.bx-chevron-down').classList.remove('rotate-180');
            }
        });
    }
</script>

