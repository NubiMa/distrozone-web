<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * Show customer profile page
     */
    public function show()
    {
        return view('customer.profile');
    }

    /**
     * Update customer profile
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $user = auth()->user();
        $user->update($validated);

        return redirect()
            ->route('customer.profile')
            ->with('success', 'Profile updated successfully!');
    }

    /**
     * Update customer password
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = auth()->user();

        // Check if current password is correct
        if (!Hash::check($validated['current_password'], $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['Current password is incorrect.'],
            ]);
        }

        // Update password
        $user->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        return redirect()
            ->route('customer.profile')
            ->with('success', 'Password updated successfully!');
    }
}