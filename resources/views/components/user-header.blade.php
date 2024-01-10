<header class="w-full fixed z-50 border-b border-gray-200 bg-white text-gray-700">
    <div class="navbar flex justify-between items-center max-w-[1300px] mx-auto px-4 ">
        <div class="flex items-center">
            <a href="/" class="flex items-center space-x-2">
                <img class="w-14 h-14" src="{{ asset('images/logo.png') }}" alt="">
                <a class="text-xl font-sans font-semibold">Fiftea-8</a>
            </a>
            <div class="hidden md:flex items-center space-x-2 px-5">
                <div class="py-2 px-4 hover:bg-gray-200 rounded">
                    <a class="font-sans text-base" href="/">Home</a>
                </div>

                <div class="py-2 px-4 hover:bg-gray-200 rounded">
                    <a class="font-sans text-base" href="{{ route('products') }}">Products</a>
                </div>
            </div>
        </div>
        @auth
            <div class="flex space-x-2">
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src="{{asset('storage/' . auth()->user()->profile->image)}}"  class="w-10 h-10"/>
                        </div>
                    </label>
                    <ul tabindex="0"
                        class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-white rounded-box w-52 flex flex-col space-y-2">

                        <a href="{{ route('profile.edit') }}" class="rounded-md hover:bg-gray-200 py-1 px-2">Profile</a>

                        <a href="{{ route('client.dashboard.index') }}"
                            class="rounded-md hover:bg-gray-200 py-1 px-2">Dashboard</a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button
                                class="w-full rounded-md bg-sbgreen hover:bg-sblight py-1 px-2 cursor-pointer text-white">Logout</button>
                        </form>

                    </ul>
                </div>
            </div>
        @else
            <div class="hidden md:flex space-x-3">
                <a class="font-sans  text-white font-medium text-base bg-sbgreen hover:bg-green-800 py-2 px-4 rounded"
                    href="{{ route('login') }}">LOGIN</a>
                <a class="font-sans text-gray-600 font-medium text-base bg-gray-200 hover:bg-gray-300 py-2 px-4 rounded"
                    href="{{ route('register') }}">REGISTER</a>
            </div>
        @endauth
        {{-- <div class="flex md:hidden">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <i class='bx bx-menu text-3xl font-medium text-gray-600'></i>
                </label>
                <ul tabindex="0"
                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52 flex flex-col space-y-1">
                    <li><a class="font-sans">Home</a></li>
                    <li><a class="font-sans">Products</a></li>
                    <li><a class="font-sans">About Us</a></li>
                    <li><a class="font-sans">Login</a></li>
                </ul>
            </div>

        </div> --}}
    </div>
</header>
