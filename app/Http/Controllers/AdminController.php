<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
        }
        $users = User::all();
        $klasifikasis = Klasifikasi::all();
        return view('admin.dashboard', compact('klasifikasis', 'users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'nullable|string|in:user,admin',
        ]);

        try {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->role = $request->input('role', 'user');
            $user->email_verified_at = now();
            $user->remember_token = null;
            $user->save();
            \Log::info('New user added: ' . $user->email);
            return redirect()->back()->with('success', 'User added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add user: ' . $e->getMessage());
        }
    }
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->role = $request->input('role', 'user');
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'User updated successfully');
    }

    public function deleteKlasifikasi($id)
    {
        $klasifikasi = Klasifikasi::findOrFail($id);
        $klasifikasi->delete();
        return redirect()->back()->with('success', 'Klasifikasi deleted successfully');
    }
    public function addKlasifikasi(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'itemid' => 'required|integer|max:255|unique:klasifikasis',
            'description' => 'nullable|string',
        ]);
        // dd($request->all());

        try {
            $klasifikasi = new Klasifikasi();
            $klasifikasi->name = $request->input('name');
            $klasifikasi->itemid = $request->input('itemid');
            $klasifikasi->description = $request->input('description', '');
            $klasifikasi->save();
            \Log::info('New klasifikasi added: ' . $klasifikasi->name);
            return redirect()->back()->with('success', 'Klasifikasi added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add klasifikasi: ' . $e->getMessage());
        }
    }
    public function updateKlasifikasi(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'itemid' => 'required|string|max:255|unique:klasifikasis,itemid,' . $id,
            'description' => 'nullable|string',
        ]);
        try {

        $klasifikasi = Klasifikasi::findOrFail($id);
        $klasifikasi->name = $request->input('name');
        $klasifikasi->itemid = $request->input('itemid');
        $klasifikasi->description = $request->input('description', '');
        $klasifikasi->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update klasifikasi: ' . $e->getMessage());
        }
        \Log::info('Klasifikasi updated: ' . $klasifikasi->name);

        return redirect()->route('admin.dashboard')->with('success', 'Klasifikasi updated successfully');
    }
}
