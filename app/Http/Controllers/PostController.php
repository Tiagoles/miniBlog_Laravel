<?php

namespace App\Http\Controllers;

use App\CommentsPosts;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $user;
    public $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $title = "Publicações";
        $posts = $this->post->all();
        return view("app.posts.posts", compact("title", "posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Criar publicação";
        return response(view("app.posts.create", ["title" => $title]), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
         
        $this->user  = json_encode(Auth::user());
        $user = json_decode($this->user);
    
        $post = $this->post;
        $postPhotoImageName = null;
        if ($request->hasFile("image_post")) {
            $postPhotoImagePath = $request->file("image_post")->store("public/img/posts");
            $postPhotoImageName = basename($postPhotoImagePath);
        };

        $post->create([
            "user_id" => $user->id,
            "author_post" => $user->name,
            "photo_profile_author_post" =>$user->photo_profile,
            "image_post" => $postPhotoImageName,
            "description" => $request->description,
            "created_at" => Date::now()->format("d-m-Y H:i:s")
        ]);
        return redirect()->route("app.home");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $post = Post::find($id);
        $post->update($request->all());
        return redirect()->route("app.home")->with("success", "Publicação alterada com sucesso.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $comments_post = CommentsPosts::where("post_id",$request->id);
        $comments_post->delete();
        $post = Post::find($request->id);
        $post->delete($request->id);
        return redirect()->route("app.home")->with("success", "Publicação deletada com sucesso");
    }
}
