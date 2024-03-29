@props([
    'cart' => $cart,
    'subtotal' => $subtotal,
])

<div class="w-full fixed z-50 border-b border-gray-200 bg-white text-gray-700">
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
                        <div tabindex="0" class="mt-3 card card-compact dropdown-content w-52 bg-white shadow">
                            <div class="card-body">
                                @if ($cart !== null)
                                    <span class="font-bold text-lg">{{ $cart->products()->count() }} Items</span>
                                @else
                                    <span class="font-bold text-red-500">NoItems</span>
                                @endif
                                <span class="text-sm text-gray-700">Subtotal: {{ $subtotal }} </span>

                                @if ($cart !== null)
                                    <div class="card-actions">
                                        <a href="{{ route('client.cart.index', ['id' => $cart->id]) }}" class="w-full py-2 rounded bg-green-800 text-white text-center">View
                                            cart</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            @if (Auth::user()->profile->image)
                                <img src="{{ asset('storage/' . auth()->user()->profile->image) }}"
                                    class="w-10 h-10" />
                            @else
                                @if (Auth::user()->profile->sex == 'Male')
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
                <a class="font-sans  text-white font-medium text-sm bg-sbgreen hover:bg-green-800 py-2 px-4"
                    href="{{ route('login') }}">LOGIN</a>
                <a class="font-sans text-gray-600 font-medium text-sm bg-gray-200 hover:bg-gray-300 py-2 px-4"
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
                    <li><a href="/" class="font-sans">Home</a></li>
                    <li><a href="{{ route('products') }}" class="font-sans">Products</a></li>
                    <li><a href="{{ route('login') }}" class="font-sans">Login</a></li>
                    <li><a href="{{ route('register') }}" class="font-sans">Register</a></li>
                </ul>
            </div>

        </div> --}}
    </div>
</div>
