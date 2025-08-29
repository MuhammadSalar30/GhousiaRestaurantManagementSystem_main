<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        // Redirect to home page since login is now handled via modal
        return redirect()->route('second', ['client', 'home']);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function store(LoginRequest $request)
    {
        try {
            $request->authenticate();

            $request->session()->regenerate();

            $user = auth()->user();

            // Determine redirect URL based on user role
            $redirectUrl = RouteServiceProvider::HOME;
            if ($user && $user->role === 'admin') {
                $redirectUrl = '/admin/dashboard'; // Admin panel URL
            }

            // Check if request expects JSON (AJAX request)
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Login successful',
                    'redirect' => $redirectUrl,
                    'user' => [
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $user->role
                    ]
                ]);
            }

            return redirect()->intended($redirectUrl);
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'The provided credentials do not match our records.',
                    'errors' => $e->errors()
                ], 422);
            }

            throw $e;
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Login failed. Please try again.'
                ], 500);
            }

            throw $e;
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Check if request expects JSON (AJAX request)
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Logout successful'
            ]);
        }

        return redirect('/');
    }
}
