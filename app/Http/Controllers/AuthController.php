<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{


    public function login(Request $request)
    {
        $credentials = $request->only("email", "password");
        if ($request->method() == "POST") {
            if (Auth::attempt($credentials)) {

                return redirect()->intended(route("app.home"));
                
            } else {
                return redirect()->back()->with("error", "Email ou senha inválidos");
            }
        } else {
            if (Auth::attempt($credentials)) {
                return view("app.index");
            } else {
                return redirect()->route("login.view")->with("error", "É necessário se autenticar antes de prosseguir.");
            }
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route("login.view")->with("logoutMsg", "Usuário deslogado com sucesso.");
    }
}
