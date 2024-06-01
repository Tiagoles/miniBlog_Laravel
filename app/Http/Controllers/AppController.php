<?php

namespace App\Http\Controllers;

use App\CommentsPosts;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Início";
        $subTitle = "Publicações";
        $posts = Post::all();
        $users = User::all();
        $comments = CommentsPosts::all();


        return view("app.index", compact("title","posts","users","comments","subTitle"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
