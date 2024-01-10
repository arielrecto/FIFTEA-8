<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse //ProfileUpdateRequest
    {
        dd($request->all());

        $imagePath = $request->file('image')->store('images', 'public');



        Profile::create([
            'image' => $imagePath,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'middle_name' => $request->input('middle_name'),
            'age' => $request->input('age'),
            'sex' => $request->input('sex'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'street' => $request->input('street'),
            'subdivision' => $request->input('subdivision'),
            'barangay' => $request->input('barangay'),
            'municipality' => $request->input('municipality'),
        ]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
