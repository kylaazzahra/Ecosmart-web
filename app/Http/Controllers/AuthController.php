<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function login() {
        if (auth()->check()) {
            return redirect()->route('home')->with('success', 'You are already logged in');
        }
        return view('auth.login');
    }
    public function loginProcess(Request $request) {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('home')->with('success', 'Login successful');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function register() {
        if (auth()->check()) {
            return redirect()->route('home')->with('success', 'You are already logged in');
        }
        return view('auth.register');
    }

    public function registerProcess(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3',
        ]);
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('auth.login')->with('success', 'Registration successful, please login');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Registration failed: ' . $e->getMessage()])->withInput();
        }
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('auth.login')->with('success', 'Logout successful');
    }

    public function profile() {
        if (!auth()->check()) {
            return redirect()->route('auth.login')->with('error', 'You must be logged in to access this page');
        }
        return view('auth.profile');
    }

    public function editProfile() {
        if (!auth()->check()) {
            return redirect()->route('auth.login')->with('error', 'You must be logged in to access this page');
        }
        return view('auth.editprofile');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
    
        $user->save();
    
        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }
    public function changePassword(Request $request) {
        $user = auth()->user();
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:3|confirmed',
        ]);

        if (!password_verify($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->update(['password' => bcrypt($request->new_password)]);

        return redirect()->route('profile')->with('success', 'Password changed successfully');
    }
}
