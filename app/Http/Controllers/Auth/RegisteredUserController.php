<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {



        $user = User::create([
            'name' => $request->account['name'],
            'email' => $request->acount['email'],
            'password' => Hash::make($request->account['password']),
        ]);


        $profile = Profile::create([
            'last_name' => $request->profile['lastName'],
            'first_name' => $request->profile['first_name'],
            'middle_name' => $request->profile['middle_name'],
            'age' => $request->profile['age'],
            'gender' => $request->profile['gender'],
            'phone' => $request->profile['phone'],
            'block' => $request->profile['block'],
            'lot' => $request->profile['lot'],
            'municipality' => $request->profile['municipality'],
            'barangay' => $request->profile['barangay'],
            'subdivision' => $request->profile['subdivision'],
            'home_no' => $request->profile['homeNo'],
            'region' => $request->profile['region'],
            'zip_code' => $request->profile['zipCode'],
            'user_id' => $user->id
        ]);


        $adminRole = Role::where('name', 'admin')->first();

        $user->assignRole($adminRole->id);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
