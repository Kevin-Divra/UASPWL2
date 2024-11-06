<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Mendapatkan semua user
    public function index()
    {
        return User::all();
    }

    // Mendapatkan user berdasarkan ID
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'User not found'], 404);
        return $user;
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
        // Validasi input
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Hash password
        $validateData['password'] = bcrypt($validateData['password']);

        // Buat user baru
        $user = User::create($validateData);

        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Validasi input
        $validateData = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        // Hash password jika ada input passowrd baru
        if (isset($validateData['password'])) {
            $validateData['password'] = bcrypt($validateData['password']);
        }

        // Update user
        $user->update($validateData);

        return response()->json($user, 200);
    }

    // Menghapus user berdasarkan ID
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'User not found'], 404);

        $user->delete();
        return response()->json(null,204);
    }

    
}