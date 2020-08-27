<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listAllUsers(){
        $users = User::all();

        return view('tables.users', [
            'users' => $users
        ]);
    }

    public function create(){
        return view('forms.user_add');
    }

    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->usuario_role = $request->usuario_role;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('user.listAll');
    }

    public function editForm(User $user){
        return view('forms.user_edit', [
            'user' => $user
        ]);
    }

    public function edit(User $user, Request $request){
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->usuario_role = $request->usuario_role;

        $user->save();

        return redirect()->route('user.listAll');
    }

    public function destroy(User $user){
        $user->delete();

        return redirect()->route('user.listAll');
    }
}

