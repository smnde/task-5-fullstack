@extends('layouts.app')
@section('content')
	<div class="flex justify-center items-center">
		<div class="w-6/12">
			<div class="p-4 bg-sky-600 rounded-t-lg shadow-lg">
				Edit category
			</div>
			<div class="h-52 py-4 px-6 bg-white rounded-b-lg shadow-lg">
				<form action="{{ route('categories.update', $category->id) }}" method="post">
					@csrf
					@method("PUT")
					<div class="mb-10">
						<label class="block text-gray-700 text-sm font-bold mb-2" for="email">
							Category name
						</label>
						<input class="shadow appearance-none border focus:border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" placeholder="Category name" value="{{ old('name', $category->name) }}">
					</div>
					<button class="py-2 px-5 bg-blue-500 rounded-lg shadow-lg float-right text-slate-800 hover:bg-blue-700 hover:text-white">Submit</button>
				</form>
			</div>
		</div>
	</div>
@endsection