<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function index()
	{
		$posts = Post::where("user_id", Auth::id())->paginate(10)->load("category");
		return PostResource::collection($posts);
	}

	public function allPost()
	{
		$posts = Post::latest();
		$posts->paginate(10)->load("author", "category");
		return PostResource::collection($posts->paginate(10)->load("author", "category"));
	}

	public function show($id)
	{
		$post = Post::findOrFail($id);
		return new PostResource($post);
	}

	public function store(PostRequest $request)
	{
		$image = !empty($request->file("image")) ? $request->file("image")->store("articles-images") : ""; 

		$data = Post::create([
			"title" => $request->title,
			"content" => $request->content,
			"image" => $image,
			"category_id" => $request->category_id,
			"user_id" => Auth::id(),
		]);

		return response()->json([
			"data" => new PostResource($data),
			"message" => "Berhasil ditambahkan",
		]);
	}

	public function update(PostRequest $request, $id)
	{
		$post = Post::findOrFail($id);

		if($request->file("image")) {
			$image = $request->file("image")->store("article-images");
			Storage::delete($post->image);
		} else {
			$image = $post->image;
		}

		$post->update([
			"title" => $request->title,
			"content" => $request->content,
			"image" => $image,
			"category_id" => $request->category_id,
			"user_id" => Auth::id(),
		]);

		return response()->json(["message" => "Berhasil diubah"]);
	}

	public function destroy($id)
	{
		$post = Post::findOrFail($id);
		Storage::delete($post->image);
		$post->delete();
		return response()->json(["message" => "Berhasil dihapus"]);
	}
}
