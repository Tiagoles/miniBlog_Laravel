<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photo_profile', 'nickname', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function rules()
    {
        return [
            "email" => "required|email|unique:users,email",
            "name" => "required|min:3|max:50",
            "password" => "required|min:4|max:12|confirmed",
            "nickname_user_create" => "required|min:4|max:10|unique:users,nickname",
            "profile_photo_user_create" => "mimes:jpeg,jpg,png"
        ];
    }
    public function feedback()
    {
        return [
            "required" => "O campo :attribute é obrigatório.",
            "nickname_user_create.required" => "O nome de usuário é obrigatório.",
            "email" => "O email precisa ser válido.",
            "unique" => ":attribute já existente.",
            "confirmed" => "Confirmação de senha inválida",
            "min" => "O campo :attribute precisa ter no mínimo :min caracteres.",
            "max" => "O campo :attribute precisa ter no máximo :max caracteres.",
        ];
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
