<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index()
	{
		$categories = Category::with('author')->orderBy("name", "ASC")->get();
		return CategoryResource::collection($categories);
	}

	public function store(CategoryRequest $request)
	{
		$data = Category::create([
			"name" => $request->name,
			"user_id" => Auth::id(),
		]);

		return response()->json([
			"data" => new CategoryResource($data),
			"message" => "Berhasil ditambahkan"
		]);
	}

	public function update(CategoryRequest $request, $id)
	{
		$category = Category::findOrFail($id);
		$category->update(["name" => $request->name]);

		return response()->json(["message" => "Berhasil diubah"]);
	}

	public function destroy($id)
	{
		Category::destroy($id);
		return response()->json(["message" => "Berhasil dihapus"]);
	}
}
