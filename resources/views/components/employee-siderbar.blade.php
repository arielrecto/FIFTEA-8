<div class="h-auto min-h-screen flex flex-col w-full py-8 border-r border-gray-300 pt-24">
    <ul class="flex flex-col space-y-1 px-3">
        {{-- <a href="{{route('employee.dashboard.index')}}" class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200">
            <i class='bx bxs-dashboard text-xl'></i>
            <p class="text-lg ">Dashboard</p>
        </a> --}}
        <a id="order" href="{{route('employee.order.index')}}" class="w-full flex justify-between items-center rounded-md px-4 py-2 group hover:bg-gray-200 cursor-pointer">
            <div class="flex space-x-2 items-center">
                <i class='bx bxs-shopping-bag text-xl'></i>
                <p class="text-lg ">Online Orders</p>
            </div>
        </a>
        <a href="{{ route('employee.pos.index') }}"
            class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
            <i class='bx bx-notepad text-xl'></i>
            <p class="text-base ">Point Of Sale</p>
        </a>
        <a href="{{ route('employee.transaction.index') }}"
        class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
        <i class='bx bx-notepad text-xl'></i>
        <p class="text-base ">Transaction</p>
    </a>
    </ul>
</div>
<script>
    openProductLinks();

    function openProductLinks() {
        const product = document.getElementById('order');
        const links = document.getElementById('orderLinks');

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
