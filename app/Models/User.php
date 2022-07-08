<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

	// no need to declare $fillable or etc, use Model::unguard() in AppServiceProvider

	// user has many categories
	public function categories()
	{
		return $this->hasMany(Category::class);
	}

	// user has many posts
	public function posts()
	{
		return $this->hasMany(Post::class);
	}

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
