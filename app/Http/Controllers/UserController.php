<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $user_id = Auth::id();
        return Inertia::render('Users/Index', [
            'users' => User::select('id', 'name', 'member', 'email')->get()
        ]);
    }

    public function show(User $user)
    {
        // dd($item);
        return Inertia::render('Users/Show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return Inertia::render('Users/Edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($item->name, $request->name);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->member = $request->member;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return to_route('users.index')
        ->with([
            'message' => '更新しました。',
            'status' => '成功しました。',
        ]);
    }
}
