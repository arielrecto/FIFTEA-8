<div class="w-full fixed bg-base-100 z-50 border-b border-gray-200 bg-white">
    <div class="navbar flex justify-between items-center container mx-auto px-5 md:px-22 lg:px-28 ">
        <div class="flex items-center">
            <div class="flex items-center space-x-2">
                <img class="w-14 h-14" src="{{asset('logo/sb.png')}}" alt="">
                <a class="text-xl font-sans font-semibold">Fiftea-8 Bucks</a>
            </div>
            <div class="hidden md:flex items-center space-x-2 px-5">
                <div class="py-2 px-4 hover:bg-gray-200 rounded">
                    <a class="font-sans text-base" href="/">Home</a>
                </div>
                <div class="py-2 px-4 hover:bg-gray-200 rounded">
                    <a class="font-sans text-base" href="{{route('products')}}">Products</a>
                </div>
                <div class="py-2 px-4 hover:bg-gray-200 rounded">
                    <a class="font-sans text-base" href="/">About Us</a>
                </div>
            </div>
        </div>

        @auth
            <div class="flex space-x-2">
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle">
                        <div class="indicator">
                            <i class='bx bx-cart-alt text-2xl text-gray-600 hover:text-gray-700'></i>
                            <span class="badge badge-sm indicator-item">8</span>
                        </div>
                    </label>
                    <div tabindex="0" class="mt-3 card card-compact dropdown-content w-52 bg-base-100 shadow">
                        <div class="card-body">
                            <span class="font-bold text-lg">8 Items</span>
                            <span class="text-info">Subtotal: $999</span>
                            <div class="card-actions">
                                <button class="btn btn-primary btn-block">View cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src="{{asset('logo/sb.png')}}" />
                        </div>
                    </label>
                    <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        <li>
                            <a class="justify-between">
                            Profile
                            <span class="badge">New</span>
                            </a>
                        </li>
                        <li><a>Settings</a></li>
                        <li><a>Logout</a></li>
                    </ul>
                </div>
            </div>
        @else
            <div class="hidden md:flex">
                <a class="font-sans text-sm text-white font-medium text-base bg-sbgreen hover:bg-green-800 py-2 px-4 rounded" href="{{route('login')}}">LOGIN</a>
            </div>
        @endauth
        <div class="flex md:hidden">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <i class='bx bx-menu text-3xl font-medium text-gray-600'></i>
                </label>
                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52 flex flex-col space-y-1">
                    <li><a class="font-sans">Home</a></li>
                    <li><a class="font-sans">Products</a></li>
                    <li><a class="font-sans">About Us</a></li>
                    <li><a class="font-sans">Login</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>
