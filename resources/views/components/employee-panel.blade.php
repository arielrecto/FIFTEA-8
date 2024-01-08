<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fif'tea-8</title>

    <link rel="icon" href="{{asset('images/logo.png')}}"/>

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

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <!-- Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
    </style>

</head>

<body class="font-sans antialiased">
    <div class="h-auto min-h-screen bg-gray-50">

        <x-employee-header />

        <div class="w-full h-full flex container mx-auto px-5 md:px-10 lg:px-10 relative">
            <div class="hidden md:block w-1/6 h-full sticky top-0">
                <x-employee-siderbar/>
            </div>

            <main class="w-full md:w-5/6 pt-16">
                {{ $slot }}
            </main>
        </div>

         <!-- drawer component -->
         <div id="drawer-navigation"
         class="fixed top-0 left-0 z-50 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-64 dark:bg-gray-800"
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
                        <a href="{{ route('admin.dashboard.index') }}"
                            class="flex space-x-2 items-center rounded-md px-4 py-2 group hover:bg-gray-200 ">
                            <i class='bx bx-log-in-circle text-xl'></i>
                            <p class="text-lg ">Admin Panel</p>
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
             </ul>
         </div>
     </div>

    </div>

    @stack('js')
</body>

</html>
