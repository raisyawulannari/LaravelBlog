<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        // return view('users.index', compact('users'));
        return view('users.index', ['user' => $user]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // return redirect()->route('users.index');
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = User::find($id); // Mengambil data user berdasarkan ID
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User tidak ditemukan');
        }
        return view('users.edit', compact('user')); // Mengirimkan data user ke view
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        // Validasi data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:8|confirmed' // Password nullable, tidak wajib
        ]);
    
        // Update user data
        $user->name = $request->name;
        $user->email = $request->email;
    
        // Hanya update password jika diisi
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'User berhasil diupdate');
    }
    

    public function destroy($user)
{
    $user = User::find($user);

    if ($user) {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User successfully deleted');
    }

    return redirect()->route('users.index')->with('error', 'User tidak ditemukan');
}

}
