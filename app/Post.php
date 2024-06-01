<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        "user_id",
        "author_post",
        "image_post",
        "description",
        "created_at",
        "photo_profile_author_post"
    ];


    public function rules()
    {
        return [
            "author_post" => "required",
            "image_post" => "mimes:jpeg ,jpg, png",
            "description" => "required",
            "photo_profile_author_post" => "required|mimes:jpeg ,jpg, png",
        ];
    }
    public function commments()
    {
        $this->hasMany(CommentsPosts::class);
    }
}
