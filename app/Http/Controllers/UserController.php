<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePassword(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'current_password' => ['required', 'string'],
                'password' => ['required', 'string', 'confirmed', Password::defaults()],
            ]);

            $user = Auth::user();

            // Check if current password is correct
            if (!Hash::check($request->current_password, $user->password)) {
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Current password is incorrect.'
                    ], 422);
                }
                
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }

            // Update the password
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            // Check if request expects JSON (AJAX request)
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Password updated successfully.'
                ]);
            }

            return back()->with('status', 'Password updated successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed.',
                    'errors' => $e->errors()
                ], 422);
            }
            
            throw $e;
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Password update failed. Please try again.'
                ], 500);
            }
            
            throw $e;
        }
    }
}
