<div class="w-full fixed z-50 border-b border-gray-200 bg-white text-gray-700">
    <div class="navbar flex justify-between items-center container mx-auto px-5 md:px-10 lg:px-10 ">
        <div class="flex items-center">
            <a href="/" class="flex items-center space-x-2">
                <img class="w-14 h-14" src="{{ asset('images/logo.png') }}" alt="">
                <a class="text-xl font-sans font-semibold">Fif'tea-8</a>
            </a>
            <div class="hidden md:flex items-center space-x-2 px-5">
                <a href="/" class="py-2 px-4 hover:bg-gray-200 rounded">
                    <p class="font-sans text-base">Home</p>
                </a>
                {{-- @if (!Auth::user()->hasRole('admin'))
                    <a href="{{ route('products') }}" class="py-2 px-4 hover:bg-gray-200 rounded">
                        <p class="font-sans text-base">Products</p>
                    </a>
                @endif --}}
                {{-- <a href="/" class="py-2 px-4 hover:bg-gray-200 rounded">
                    <p class="font-sans text-base">About Us</p>
                </a> --}}
            </div>
        </div>

        @auth
            <div class="hidden md:flex space-x-2">

                <div>
                    <a href="{{ route('employee.order.index') }}">Employee Dashboard</a>
                </div>

                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            @if (Auth::user()->profile?->image)
                                <img src="{{ asset('storage/' . auth()->user()->profile->image) }}"
                                    class="w-10 h-10" />
                            @else
                                @if (Auth::user()->profile?->sex == 'Male')
                                    <img id="db-cover-photo"
                                    src="{{asset('images/male.png')}}" alt="Image"
                                    class="w-10 h-10 rounded-full object-cover object-center bg-white" />
                                @else
                                    <img id="db-cover-photo"
                                    src="{{asset('images/female.png')}}" alt="Image"
                                    class="w-10 h-10 rounded-full object-cover object-center bg-white" />
                                @endif
                            @endif
                        </div>
                    </label>
                    <ul tabindex="0"
                        class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-white rounded-box w-52 flex flex-col space-y-2">

                        <a href="{{ route('profile.edit') }}" class="rounded-md hover:bg-gray-100 py-1 px-2">Profile</a>

                        <a href="{{ route('admin.dashboard.index') }}"
                            class="rounded-md hover:bg-gray-100 py-1 px-2">Dashboard</a>

                        <a class="rounded-md hover:bg-gray-100 py-1 px-2">Settings</a>

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
                <a class="font-sans text-sm text-white font-medium bg-sbgreen hover:bg-green-800 py-2 px-4"
                    href="{{ route('login') }}">LOGIN</a>
                <a class="font-sans text-sm text-gray-600 font-medium bg-gray-200 hover:bg-gray-300 py-2 px-4"
                    href="{{ route('register') }}">REGISTER</a>
            </div>
        @endauth
        <!-- drawer init and show -->
        <div class="md:hidden text-center">
            <button type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                aria-controls="drawer-navigation">
                <i class='bx bx-menu text-3xl font-medium text-gray-600'></i>
            </button>
        </div>

    </div>
</div>
