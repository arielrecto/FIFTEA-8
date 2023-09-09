@props([
    'cart' => $cart,
    'subtotal' => $subtotal,
])

<div class="w-full fixed z-50 border-b border-gray-200 bg-white">
    <div class="navbar flex justify-between items-center container mx-auto px-5 md:px-22 lg:px-28 ">
        <div class="flex items-center">
            <div class="flex items-center space-x-2">
                <img class="w-14 h-14" src="{{ asset('images/logo.png') }}" alt="">
                <a class="text-xl font-sans font-semibold">Fiftea-8</a>
            </div>
            <div class="hidden md:flex items-center space-x-2 px-5">
                <div class="py-2 px-4 hover:bg-gray-200 rounded">
                    <a class="font-sans text-base" href="/">Home</a>
                </div>
                <div class="py-2 px-4 hover:bg-gray-200 rounded">
                    <a class="font-sans text-base" href="{{ route('products') }}">Products</a>
                </div>
                <div class="py-2 px-4 hover:bg-gray-200 rounded">
                    <a class="font-sans text-base" href="/">About Us</a>
                </div>
            </div>
        </div>

        @auth
            <div class="flex space-x-2">
                @if (Auth::user()->roles->first()->name === 'customer')
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn btn-ghost btn-circle">
                            <div class="indicator">
                                <i class='bx bx-cart-alt text-2xl text-gray-600 hover:text-gray-700'></i>
                                @if ($cart !== null)
                                    <span class="badge badge-sm indicator-item">{{ $cart->products()->count() }}</span>
                                @else
                                    <span class="badge badge-sm indicator-item">0</span>
                                @endif
                            </div>
                        </label>
                        <div tabindex="0" class="mt-3 card card-compact dropdown-content w-52 bg-base-100 shadow">
                            <div class="card-body">
                                @if ($cart !== null)
                                    <span class="font-bold text-lg">{{ $cart->products()->count() }} Items</span>
                                @else
                                    <span class="font-bold text-lg text-red-500">0 Items</span>
                                @endif
                                <span class="text-info">Subtotal: {{ $subtotal }} </span>

                                @if ($cart !== null)
                                    <div class="card-actions">
                                        <a href="{{ route('client.cart.index', ['id' => $cart->id]) }}"
                                            class="btn btn-primary btn-block">View cart</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src="{{ asset('images/logo.png') }}" />
                        </div>
                    </label>
                    <ul tabindex="0"
                        class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52 flex flex-col space-y-2">

                        <a href="{{ route('profile.edit') }}" class="rounded-md hover:bg-gray-200 py-1 px-2">Profile</a>

                        {{-- <a class="rounded-md hover:bg-gray-200 py-1 px-2">Settings</a> --}}

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
        <div class="flex md:hidden">
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

        </div>
    </div>
</div>
