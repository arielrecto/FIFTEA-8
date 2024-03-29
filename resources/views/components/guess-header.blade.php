<div class="w-full sticky top-0 z-50 border-b border-gray-200 bg-white shadow">
    <div class="py-2 flex justify-between items-center w-full max-w-[1300px] mx-auto px-4 ">
        <div class="flex items-center py-1">
            <a href="/" class="flex items-center space-x-2">
                <img class="w-12 h-12" src="{{ asset('images/logo.png') }}" alt="">
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


        <div class="hidden md:flex space-x-3">

            @if (Auth::user())
                <a class="font-sans  text-white font-medium text-sm bg-sbgreen hover:bg-green-800 py-2 px-4"
                    href="{{ Auth::user()->roles->first()->name === 'admin'? route('admin.dashboard.index'): (Auth::user()->roles()->first()->name === 'customer'? route('client.dashboard.index'): route('employee.dashboard.index')) }}">Dashboard</a>
            @else
                <a class="font-sans  text-white font-medium text-sm bg-sbgreen hover:bg-green-800 py-2 px-4 "
                    href="{{ route('login') }}">LOGIN</a>
                <a class="font-sans text-gray-600 font-medium text-sm bg-gray-200 hover:bg-gray-300 py-2 px-4 "
                    href="{{ route('register') }}">REGISTER</a>
            @endif

        </div>

        <div class="flex md:hidden">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <i class='bx bx-menu text-3xl font-medium text-gray-600'></i>
                </label>
                <ul tabindex="0"
                    class="bg-white menu menu-compact dropdown-content mt-3 p-2 shadow rounded-box w-52 flex flex-col space-y-1">
                    <li><a href="/" class="font-sans">Home</a></li>
                    <li><a href="{{ route('products') }}" class="font-sans">Products</a></li>
                    <li><a href="{{ route('login') }}" class="font-sans">Login</a></li>
                    <li><a href="{{ route('register') }}" class="font-sans">Register</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>
