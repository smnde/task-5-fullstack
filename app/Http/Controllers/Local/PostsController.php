<?php

namespace App\Http\Controllers\Local;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
	public function __construct()
	{
		$this->middleware("auth");
	}

    public function index()
	{
		$articles = Post::where("user_id", Auth::id());
		
		if(request("search")) {
			$articles->where("title", "LIKE", "%" . request("search") . "%");
		}
        return view('articles.index', [
			"articles" => $articles->paginate(10)->load("category"),
		]);
	}

	public function create()
	{
		$categories = Category::with("author")->get();
		return view("articles.create", compact("categories"));
	}

	public function show($id)
	{
		$article = Post::findOrFail($id);
		return view('articles.show', ["article" => $article]);
	}

	public function store(PostRequest $request)
	{
		$image = !empty($request->file("image")) ? $request->file("image")->store("article-images") : "";

		Post::create([
			"title" => $request->title,
			"content" => $request->content,
			"image" => $image,
			"user_id" => Auth::id(),
			"category_id" => $request->category_id,
		]);

		return redirect()->route("articles.index")->with("success", "Berhasil ditambakan");
	}

	public function edit($id)
	{
		$article = Post::findOrFail($id);
		$categories = Category::with("author")->get();
		return view("articles.edit", [
			"article" => $article,
			"categories" => $categories,
		]);
	}

	public function update(PostRequest $request, $id)
	{
		$article = Post::findOrFail($id);

		if($request->file("image")) {
			$image = $request->file("image")->store("article-images");
			Storage::delete($article->image);
		} else {
			$image = $article->image;
		}

		$article->update([
			"title" => $request->title,
			"content" => $request->content,
			"image" => $image,
			"category_id" => $request->category_id,
		]);

		return redirect()->route("articles.index")->with("success", "Berhasil diubah");
	}

	public function destroy($id)
	{
		$article = Post::findOrFail($id);
		Storage::delete($article->image);
		$article->delete();
		return redirect()->back()->with("success", "Berhasil dihapus");
	}
}
