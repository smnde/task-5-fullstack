@extends('layouts.app')
@section('content')
<div class="w-full flex justify-center px-28 overflow-hidden">
	<div>
		<div class="h-12 w-[800px] bg-sky-400 rounded-t-lg shadow-lg">
		
		</div>
		<div class="w-[800px] bg-white rounded-b-lg shadow-lg px-10 py-5">
			<form action="{{ route('articles.update', $article->id) }}" method="post" enctype="multipart/form-data">
				@csrf
				@method("PUT")
				<div class="mb-4">
					<label class="block text-gray-700 text-sm font-bold mb-2" for="title">
						Title
					</label>
					<input class="shadow appearance-none border focus:border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" name="title" placeholder="Title" value="{{ old('title', $article->title) }}">
				</div>
				<div class="mb-4">
					<label class="block text-gray-700 text-sm font-bold mb-2" for="category">
						Category
					</label>
					<select name="category_id" id="category" class="shadow bg-white  appearance-none border focus:border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
						<option value="">Choose category</option>
						@foreach ($categories as $category)
							<option value="{{ $category->id }}" {{ $category->id === $article->category_id ? "selected" : "" }}>
								{{ $category->name }}
							</option>
						@endforeach
					</select>
				</div>
				<div class="mb-4">
					<label class="block text-gray-700 text-sm font-bold mb-2" for="image">
						Image
					</label>
					<input class="shadow appearance-none border focus:border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" type="file" name="image">
				</div>
				<div class="mb-6 overflow-auto">
					<label class="block text-gray-700 text-sm font-bold mb-2" for="content">
						Content
					</label>
					<input type="hidden" name="content" id="content" value="{{ old("content", $article->content) }}">
					<trix-editor input="content"></trix-editor>
				</div>
				<button type="submit" class="py-2 px-6 rounded-lg shadow-lg bg-blue-600 hover:text-white hover:bg-blue-800">Submit</button>
			</form>
		</div>
	</div>
</div>
@endsection