<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

	// no need to declare $fillable or etc, use Model::unguard() in AppServiceProvider

	// Category belongs to user
	public function author()
	{
		return $this->belongsTo(User::class, "user_id");
	}

	// Category has many posts / articles
	public function posts()
	{
		return $this->hasMany(Post::class);
	}
}
