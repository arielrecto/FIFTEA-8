<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fif'tea-8</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Quill -->
    <!-- Main Quill library -->
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <!-- Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">


    <!-- flaticon -->
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        [x-cloak] { display: none !important; }
    </style>


</head>

<body class="font-sans antialiased">
    <div class="h-auto min-h-screen bg-gray-50">

        <x-admin-header />

        <div class="w-full h-full flex container mx-auto px-5 md:px-10 lg:px-10 pt-16">
            <div class="hidden md:block w-1/6 h-full sticky top-0">
                <x-admin-sidebar />
            </div>

            <main class="w-full md:w-5/6">
                {{ $slot }}
            </main>
        </div>



        <!-- drawer component -->
        <div id="drawer-navigation"
            class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-64 dark:bg-gray-800"
            tabindex="-1" aria-labelledby="drawer-navigation-label">
            <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">
                Menu</h5>
            <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div class="py-4 overflow-y-auto">
                <ul class="space-y-2 font-medium">
                    <div class="flex h-auto flex-col w-full ">
                        <ul class="flex flex-col space-y-1">
                            <a href="{{ route('admin.dashboard.index') }}"
                                class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200">
                                <i class='bx bxs-dashboard text-xl'></i>
                                <p class="text-lg ">Dashboard</p>
                            </a>
                            <a id="product-mv"
                                class="w-full flex justify-between items-center rounded-md px-4 py-2 group hover:bg-gray-200 cursor-pointer">
                                <div class="flex space-x-2 items-center">
                                    <i class='bx bxs-shopping-bag text-xl'></i>
                                    <p class="text-lg ">Product</p>
                                </div>
                                <i class='bx bx-chevron-down text-xl'></i>
                            </a>
                            <div id="productLinks-mv" class="flex flex-col hidden px-2 border-t border-gray-300 py-1">
                                <a href="{{ route('admin.products.create') }}"
                                    class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
                                    <i class='bx bx-plus-circle text-xl'></i>
                                    <p class="text-base ">Add New</p>
                                </a>
                                <a href="{{ route('admin.products.index') }}"
                                    class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
                                    <i class='bx bx-list-ul text-xl'></i>
                                    <p class="text-base ">List</p>
                                </a>
                            </div>
                            <a href="{{ route('admin.supply.index') }}"
                                class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
                                <i class='bx bx-notepad text-xl'></i>
                                <p class="text-lg ">Inventory</p>
                            </a>
                            <a href="{{ route('admin.employee.index') }}"
                                class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
                                <i class='bx bxs-user-detail text-xl'></i>
                                <p class="text-lg ">Employee</p>
                            </a>
                            <a href="{{ route('admin.transaction.index') }}"
                                class="flex space-x-2 items-center rounded-md px-4 py-2 group {{ Route::is('admin.transaction.index') ? 'bg-gray-200' : '' }} hover:bg-gray-200 ">
                                <i class='bx bx-food-menu text-xl'></i>
                                <p class="text-lg ">Transaction</p>
                            </a>
                            <a href="{{ route('admin.feedbacks.index') }}"
                                class="flex space-x-2 items-center rounded-md px-4 py-2 group
                            {{ Route::is('admin.feedbacks.index') ? 'bg-gray-200' : '' }} hover:bg-gray-200 ">
                                <i class='bx bx-message-detail text-xl'></i>
                                <p class="text-lg ">Feedbacks</p>
                            </a>
                            <a href="{{ route('employee.order.index') }}"
                                class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
                                <i class='bx bx-log-in-circle text-xl'></i>
                                <p class="text-lg ">Employee's Access</p>
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="rounded">
                                @csrf
                                <button
                                    class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
                                    <i class='bx bx-log-out text-xl'></i>
                                    <p class="text-lg ">Logout</p>
                                </button>
                            </form>
                        </ul>
                    </div>
                    <script>
                        openProductLinks();

                        function openProductLinks() {
                            const product = document.getElementById('product-mv');
                            const links = document.getElementById('productLinks-mv');

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
                </ul>
            </div>
        </div>


    </div>

    @stack('js')
</body>

</html>
