<div class="w-full fixed bg-base-100 z-50 border-b border-gray-200 bg-white">
    <div class="navbar flex justify-between items-center container mx-auto px-5 md:px-10 lg:px-10 ">
        <div class="flex items-center">
            <div class="flex items-center space-x-2">
                <img class="w-14 h-14" src="{{asset('images/logo.png')}}" alt="">
                <a class="text-xl font-sans font-semibold">Fif'tea-8</a>
            </div>
            <div class="hidden md:flex items-center space-x-2 px-5">
                <a  href="/" class="py-2 px-4 hover:bg-gray-200 rounded">
                    <p class="font-sans text-base">Home</p>
                </a>
                <a href="{{route('products')}}" class="py-2 px-4 hover:bg-gray-200 rounded">
                    <p class="font-sans text-base">Products</p>
                </a>
                <a href="/" class="py-2 px-4 hover:bg-gray-200 rounded">
                    <p class="font-sans text-base">About Us</p>
                </a>
            </div>
        </div>

        @auth
            <div class="hidden md:flex space-x-2">
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src="{{asset('images/logo.png')}}" />
                        </div>
                    </label>
                    <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52 flex flex-col space-y-2">

                        <a href="{{ route('profile.edit') }}" class="rounded-md hover:bg-gray-100 py-1 px-2">Profile</a>

                        <a href="{{ route('admin.dashboard.index')}}" class="rounded-md hover:bg-gray-100 py-1 px-2">Dashboard</a>

                        <a class="rounded-md hover:bg-gray-100 py-1 px-2">Settings</a>

                        <form action="{{ route('logout')}}" method="POST" >
                            @csrf
                            <button class="w-full rounded-md bg-sbgreen hover:bg-sblight py-1 px-2 cursor-pointer text-white">Logout</button>
                        </form>

                    </ul>
                </div>
            </div>
        @else
            <div class="hidden md:flex space-x-3">
                <a class="font-sans text-sm text-white font-medium text-base bg-sbgreen hover:bg-green-800 py-2 px-4 rounded" href="{{route('login')}}">LOGIN</a>
                <a class="font-sans text-sm text-gray-600 font-medium text-base bg-gray-200 hover:bg-gray-300 py-2 px-4 rounded" href="{{route('register')}}">REGISTER</a>
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
                    <form action="{{ route('logout')}}" method="POST" >
                        @csrf
                        <button class="w-full rounded-md bg-sbgreen hover:bg-sblight py-1 px-2 cursor-pointer text-white">Logout</button>
                    </form>
                </ul>
            </div>

        </div>
    </div>
</div>
