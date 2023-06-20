<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="w-full flex flex-col space-y-6 items-center justify-center pt-32">
        <div class="flex flex-col items-center space-y-4 w-96">
            <div class="w-32 rounded-full">
                <img src="{{asset('images/logo.png')}}" />
            </div>
            <div class="flex flex-col items-center justify-center">
                <h1 class="text-xl font-semibold">Welome to FifTea-8</h1>
                <p class="text-gray-500 text-sm text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt, quod.</p>
            </div>
        </div>
        <form method="POST" action="{{ route('login') }}" class="w-96">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <button class="w-full px-4 py-2 rounded bg-sbgreen text-white mt-4">LOGIN</button>

            <div class="flex items-center justify-center mt-4 ">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

            </div>
        </form>

        <div class="flex space-x-2 justify-start">
            <p class="text-gray-500 text-sm ">Don't have an account yet? </p>
            <a class="text-blue-500 text-sm hover:underline" href="">Sign Up</a>
        </div>
    </div>

</x-guest-layout>
