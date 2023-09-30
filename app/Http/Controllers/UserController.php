<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDOException;

class UserController extends Controller
{
    public function create()
    {
        return view('usuario.create');
    }

    public function store(Request $request)
    {
        try {
            $validationUser = User::whereEmail($request->email)->exists();
            if($validationUser) {
                return redirect()->back()->with('msg', 'Já existe um usuário com esse email');
            }
            $user = User::create($request->all());
            Auth::login($user);
            return to_route('usuario.faqs', $user->id);
        } catch(\Throwable $th) {
            dd($th);
            return view('usuario.create')->with('msg', 'Erro ao cadastrar');
        }
    }

    public function faqs(User $usuario)
    {
        return view('usuario.faqs', compact('usuario'));
    }

    public function faqsResponse(Request $request, User $usuario)
    {
        $usuario->update(['renda_mensal' => $request->renda_mensal]);

        return to_route('home.user');
    }

    public function login()
    {
        return view('usuario.login');
    }

    public function autenticacao(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return to_route('home.user');
        }
        return redirect()->back()->with('msg', 'Dados incorretos, tente novamente.');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login');
    }
}
