<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{

    public function index()
    {
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

    public function update(UpdateItemRequest $request, Item $item)
    {
        // dd($item->name, $request->name);
        $item->name = $request->name;
        $item->memo = $request->memo;
        $item->price = $request->price;
        $item->is_selling = $request->is_selling;
        $item->save();
        return to_route('items.index')
        ->with([
            'message' => '更新しました。',
            'status' => '成功しました。',
        ]);
    }
}
