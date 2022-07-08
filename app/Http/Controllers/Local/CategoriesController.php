<?php

namespace App\Http\Controllers\Local;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
	public function __construct()
	{
		$this->middleware("auth");
	}

    public function index()
	{
		$categories = Category::with("author")->orderBy("name", "ASC")->get();
		return view("categories.index", compact("categories"));
	}

	public function create()
	{
		return view("categories.create");
	}

	public function store(CategoryRequest $request)
	{
		Category::create([
			"name" => $request->name,
			"user_id" => Auth::id(),
		]);

		return redirect()->back()->with("success", "Berhasil ditambahkan");
	}

	public function edit($id)
	{
		$category = Category::findOrFail($id);
		return view('categories.edit', ["category" => $category]);
	}

	public function update(CategoryRequest $request, $id)
	{
		$category = Category::findOrFail($id);
		$category->update(["name" => $request->name]);

		return redirect()->route("categories.index")->with("success", "Berhasil diubah");
	}

	public function destroy($id)
	{
		Category::destroy($id);
		return redirect()->back()->with("success", "Berhasil dihapus");
	}
}
