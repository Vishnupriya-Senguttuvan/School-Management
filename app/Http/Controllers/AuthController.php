<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);

        // Attempt authentication
        if (Auth::attempt($request->only('email', 'password'))) {
            // Get authenticated user
            $user = Auth::user();

            // Validate the user's role
            if ($user->role === $request->role) {
                // Redirect based on role
                if ($request->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif ($request->role === 'student') {
                    return redirect()->route('student.dashboard');
                } elseif ($request->role === 'parent') {
                    return redirect()->route('parent.dashboard');
                } else {
                    // Handle unexpected role
                    Auth::logout();
                    return back()->with('error', 'Invalid role detected.');
                }
            } else {
                // Logout and error if roles mismatch
                Auth::logout();
                return back()->with('error', 'Invalid role for this account.');
            }
        }

        // Return error if authentication fails
        return back()->with('error', 'Invalid credentials.');
    }
}
