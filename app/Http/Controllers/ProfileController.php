<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'age' => 'required|integer|min:1',
            'sex' => 'required|in:Male,Female',
            'phone' => 'required|string|max:20',
            'street' => 'required|string|max:255',
            'subdivision' => 'nullable|string|max:255',
            'barangay' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore(auth()->user()->id)],
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('profiles', 'public') : auth()->user()->profile->image;

        $user = auth()->user()->update([
            'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
            'email' => $request->input('email')
        ]);

        if (!$user) {
            return back()->with('error', 'Something went wrong, Please try again.');
        }

        $profile = auth()->user()->profile;

        $profile->image = $imagePath;
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->middle_name = $request->input('middle_name');
        $profile->age = $request->input('age');
        $profile->sex = $request->input('sex');
        $profile->phone = $request->input('phone');
        $profile->lot = $request->input('lot');
        $profile->street = $request->input('street');
        $profile->subdivision = $request->input('subdivision');
        $profile->barangay = $request->input('barangay');
        $profile->municipality = $request->input('municipality');

        $profile->save();

        if (!$profile) {
            return back()->with('error', 'Something went wrong, Please try again.');
        }
        return back()->with('success', 'Profile updated successfully.');
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
