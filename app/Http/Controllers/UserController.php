<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $users = \App\Models\User::all(); // Admin bisa lihat semua user
        } else {
            $users = \App\Models\User::role('user')->get(); // User biasa hanya lihat user lain
        }

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'roles'    => 'array'
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->syncRoles($request->roles);

        alert('success', 'User berhasil ditambahkan');
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $userRole = $user->roles->pluck('name')->toArray();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'roles' => 'array'
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        $user->syncRoles($request->roles);

        alert('success', 'User berhasil diupdate');
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        alert('success', 'User berhasil dihapus');
        return redirect()->route('users.index');
    }
}
