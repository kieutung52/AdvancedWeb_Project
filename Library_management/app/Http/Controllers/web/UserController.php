<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();

        return view('admin.ad_user.users', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('ad_user.users')->with('success', 'User deleted successfully.');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.ad_user.update', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|string|in:admin,user',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email', 'role']));

        return redirect()->route('ad_user.users')->with('success', 'User updated successfully.');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'role' => 'required|string|in:admin,user',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);   
            return redirect()->route('ad_user.users')->with('success', 'User created successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
