<?php

namespace App\Http\Controllers;

use App\CommentsPosts;
use App\Post;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $user;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function welcome()
    {
        $title = "Bem vindo(a)";
        return view("welcome", ["title" => $title]);
    }
    public function index()
    {
        $title = "Entrar";
        return view("login", compact("title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Registrar";
        return view("register", ["title" => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $user = $this->user;

        $request->validate($user->rules(), $user->feedback());

        if ($request->input("password") == $request->input("password_confirmation")) {
            if ($request->hasFile("profile_photo_user_create")) {
                $profilePhotoImagePath = $request->file("profile_photo_user_create")->store("public/img/profile_photos");
                $profilePhotoImageName = basename($profilePhotoImagePath);
            } else {
                $profilePhotoImageName = "";
            }

            User::create(
                [
                    "name" => $request->input("name"),
                    "email" => $request->input("email"),
                    "password" => bcrypt($request->input("password")),
                    "nickname" => $request->input("nickname_user_create"),
                    "photo_profile" => $profilePhotoImageName,
                ]
            );
            $user = User::all();

            return redirect()->route('login.view')->with("success", "Usuário cadastrado com sucesso.");
        } else {

            return redirect()->route('register.view')->with("error", "Confirmação de senha inválida.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $subTitle = "Perfil do usuário";
        $title = "Perfil do usuário";
        $posts = Post::where("user_id", $user->id);
        return view("app.user.show", ["subTitle" => $subTitle, "user" => $user, "posts" => $posts, "title"=>$title]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $title = "Seu Perfil";
        $subTitle = "Suas publicações";
        $user = Auth::user();
        $posts = Post::where("user_id", $user->id)->get();
        $comments = CommentsPosts::all();

        return view("app.user.edit", compact("title", "user", "posts", "comments","subTitle"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
