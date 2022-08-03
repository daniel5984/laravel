<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use WithPagination;

    public function index()
    {
        $users = User::select('id', 'name', 'email')->paginate(10);

        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $users = User::select('id', 'name', 'email')->paginate(10);

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('users.index', $user);
    }

}
