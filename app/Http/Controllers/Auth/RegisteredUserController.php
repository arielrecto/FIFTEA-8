<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Profile;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

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

    public function store(Request $request): JsonResponse
    {
        // dd($request->all());

        $data = $request->all();

        $existingUser = User::where('email', $data['account']['email'])->first();
        if ($existingUser) {
            return response()->json(['error' => 'Email already exists.'], 422);
        }

        $user = User::create([
            'name' => $data['profile']['firstName'] . ' ' . $data['profile']['lastName'],
            'email' => $data['account']['email'],
            'password' => Hash::make($data['account']['password']),
        ]);

        $profile = Profile::create([
            'last_name' => $data['profile']['lastName'],
            'first_name' => $data['profile']['firstName'],
            'middle_name' => $data['profile']['middleName'],
            'age' => $data['profile']['age'],
            'sex' => $data['profile']['sex'],
            'phone' => $data['profile']['phone'],
            'lot' => $data['address']['lot'],
            'street' => $data['address']['street'],
            'subdivision' => $data['address']['subdivision'] ?? null,
            'barangay' => $data['address']['barangay'],
            'municipality' => $data['address']['municipality'],
            'user_id' => $user->id,
        ]);

        $adminRole = Role::where('name', 'customer')->first();

        $user->assignRole($adminRole->id);

        return response()->json(['message' => 'Registration successful'], 200);
    }

}
