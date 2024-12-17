<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.home'); // Pastikan path file Blade sudah benar
    }

    public function profile()
    {
        $user = Auth::user(); // Get the logged-in user

        if (!$user) {
            return redirect('/login')->with('error', 'Please log in first.');
        }

        // Eager load the address (it can be null)
        $user->load('address');

        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Get the authenticated user
        $user = Auth::user();
        $user->name = $validated['name'];

        if ($validated['password']) {
            $user->password = Hash::make($validated['password']);
        }

        // Save the updated user data
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function updateAddress(Request $request)
    {
        $request->validate([
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'post_code' => 'required|numeric',
        ]);

        $user = Auth::user();

        // If the user already has an address, update it
        if ($user->address) {
            $user->address->update($request->only(['street', 'city', 'post_code']));
        } else {
            // Otherwise, create a new address
            UserAddress::create([
                'id_user' => $user->id,
                'street' => $request->street,
                'city' => $request->city,
                'post_code' => $request->post_code,
            ]);
        }

        return redirect()->back()->with('success', 'Address updated successfully.');
    }



    public function invoice()
    {
        return view('layouts.invoice'); // Pastikan path file Blade sudah benar
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validasi input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    // Hash password
    $validatedData['password'] = bcrypt($validatedData['password']);

    // Buat user baru
    $user = User::create($validatedData);

    return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'User not found'], 404);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    // Validasi input
    $validatedData = $request->validate([
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|string|email|max:255|unique:users,email,' . $id,
        'password' => 'nullable|string|min:8',
    ]);

    // Hash password jika ada input password baru
    if (isset($validatedData['password'])) {
        $validatedData['password'] = bcrypt($validatedData['password']);
    }

    // Update user
    $user->update($validatedData);

    return response()->json($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'User not found'], 404);

        $user->delete();
        return response()->json(null, 204);
    }
}