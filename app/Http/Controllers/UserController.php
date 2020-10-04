<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listAllUsers()
    {
        $userAuth = Auth::user();

        if ($userAuth && $userAuth->isAdministrador()) {
            $users = User::all();

            return view('admin.tables.users', [
                'users' => $users
            ]);
        }
        return redirect()->route('planta.listAll')->withErrors(['Voce precisa ser administrador para ver os usuarios']);
    }

    public function create()
    {
        $userAuth = Auth::user();

        if ($userAuth && $userAuth->isAdministrador()) {
            return view('admin.forms.user_add');
        }
        return redirect()->route('planta.listAll')->withErrors(['Voce precisa ser administrador para ver os usuarios']);
    }

    public function store(UserRequest $request)
    {
        $userAuth = Auth::user();

        if ($userAuth && $userAuth->isAdministrador()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->password = Hash::make($request->password);

            $user->save();

            return redirect()->route('user.listAll');
        }
        return redirect()->route('planta.listAll')->withErrors(['Voce precisa ser administrador para cadastrar usuario']);
    }

    public function editForm(user $user)
    {
        $userAuth = Auth::user();

        if ($userAuth && $userAuth->isAdministrador()) {
            return view('admin.forms.user_edit', [
                'user' => $user
            ]);
        }
        return redirect()->route('planta.listAll')->withErrors(['Voce precisa ser administrador para editar usuarios']);
    }

    public function edit(User $user, UserRequest $request)
    {
        $userAuth = Auth::user();

        if ($userAuth && $userAuth->isAdministrador()) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;

            $user->save();

            return redirect()->route('user.listAll');
        }
        return redirect()->route('planta.listAll')->withErrors(['Voce precisa ser administrador para editar usuarios']);
    }

    public function destroy(User $user)
    {
        $userAuth = Auth::user();

        if ($userAuth && $userAuth->isAdministrador()) {
            $user->delete();

            return redirect()->route('user.listAll');
        }
        return redirect()->route('planta.listAll')->withErrors(['Voce precisa ser administrador para deletar usuarios']);
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('planta.listAll');
    }
}
