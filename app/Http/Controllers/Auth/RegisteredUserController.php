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
    public function store(Request $request)  : RedirectResponse
    {




        $user = User::create([
            'name' => $request->firstName . $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $profile = Profile::create([
            'last_name' => $request->lastName,
            'first_name' => $request->firstName,
            'middle_name' => $request->middleName,
            'age' => $request->age,
            'sex' => $request->sex,
            'phone' => $request->phone,
            'block' => $request->block,
            'lot' => $request->lot,
            'municipality' => $request->municipality,
            'barangay' => $request->barangay,
            'subdivision' => $request->subdivision,
            'home_no' => $request->homeNo,
            'region' => $request->region,
            'zip_code' => $request->zipCode,
            'user_id' => $user->id
        ]);


        $adminRole = Role::where('name', 'customer')->first();


        // event(new Registered($user));

        Auth::login($user);

        $user->assignRole($adminRole->id);

        // return response()->json([
        //     'message' => 'register success'
        // ], 200);

        return redirect(RouteServiceProvider::HOME);
    }
}
