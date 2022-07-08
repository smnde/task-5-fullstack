<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
		$articles = Post::latest();

		if(request("search")) {
			$articles->where("title", "LIKE", "%" . request("search") . "%");
		}
		
        return view('home', [
			"articles" => $articles->paginate(10)->load("category", "author"),
		]);
    }

	public function detail($id)
	{
		$article = Post::findOrFail($id);
		return view('articles.show', ["article" => $article]);
	}
}
