<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentsPosts extends Model
{
    protected $fillable = [
        'comments',
        "photo_profile_author_comment",
        'post_id',
        'user_id',
        'name',
        'created_at',
    ];


    public function user(){
        $this->belongsTo(User::class);
    }
    public function post(){
        $this->belongsTo(Post::class);
    }
}
