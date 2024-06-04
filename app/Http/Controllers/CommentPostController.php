<?php

namespace App\Http\Controllers;

use App\CommentsPosts;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class CommentPostController extends Controller
{
    public function store(Request $request)

    {
        $posts = Post::all();
        $user = Auth::user();

        $comment = new CommentsPosts();
        $comments = $comment->create([
            'comments' => $request->input("text-area-comment-post"),
            'name' => $user->name,
            "photo_profile_author_comment" => $user->photo_profile,
            'user_id' => $user->id,
            'post_id' => $request->post_id,
            'created_at' => Date::now()->format("d-m-Y H:i:s")
        ]);
        $title = "Seu perfil";
        return redirect()->route('edit.user')->with(
            [
                "title" => $title,
                "comments" => $comments,
                "user" => $user,
                "posts" => $posts,
            ]
        );
    }
    public function destroy(Request $request)
    {

        $comment = CommentsPosts::where("id_comment", $request->id)->get();
        $success = $comment->delete();
        if ($success) {
            return redirect()->route("app.home")->with("success", "Comentário excluído com sucesso");
        } else {
        }
    }
}
