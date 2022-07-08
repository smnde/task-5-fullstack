@extends('layouts.app')
@section('content')
<div class="flex justify-center items-center mb-5">
	<form action="/articles" method="GET" class="flex w-full">
		<input class="shadow appearance-none border focus:border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="search" type="text" name="search" placeholder="Search title" value="{{ old("search", request("search")) }}" />
		<button class="shadow appearance-none rounded py-2 px-5 ml-2 leading-tight bg-blue-600 text-white hover:bg-blue-700">Search</button>
	</form>
</div>
<div class="w-full px-5 bg-white rounded-lg shadow-lg h-[380px] overflow-y-auto">
	<div class="flex justify-between w-full py-5">
		<h4 class="text-xl font-semibold">Here's your articles</h4>
		<a class="py-1.5 px-6 rounded-lg bg-blue-600 text-white hover:bg-blue-800 hover:ring-2 ring-cyan-500" href="{{ route('articles.create') }}">New article</a>
	</div>
	
	@foreach ($articles as $article)
		<div class="py-3 px-5 mb-2 w-full bg-slate-100 rounded-lg shadow-xl flex justify-between items-center hover:bg-sky-200">
			<a href="{{ route('articles.show', $article->id) }}" class="truncate text-lg w-full font-semibold text-slate-800 hover:text-cyan-600">
				{{ $article->title }}
			</a>
			<div class="w-5/12 flex justify-end">
				<form action="{{ route('articles.destroy', $article->id) }}" method="post">
					@csrf
					@method("DELETE")
					<a href="{{ route('articles.edit', $article->id) }}" class="bg-green-500 py-1.5 px-4 rounded-lg shadow-lg text-slate-800 hover:bg-green-700 hover:text-white">Edit</a>
					<button type="submit" class="bg-red-500 py-1 px-4 rounded-lg shadow-lg text-slate-800 hover:bg-red-700 hover:text-white">Delete</button>
				</form>
			</div>
		</div>
	@endforeach

	{{-- @foreach ($articles as $article)
		<div class="mb-5 w-full flex h-40 bg-white rounded-lg shadow-lg overflow-hidden">
			<div class="w-full bg-white py-2 px-4 overflow-hidden">
				<h1 class="text-xl font-semibold px-5 mb-1 truncate">{{ $article->title }}</h1>
				<span class="block px-5 italic text-sm capitalize text-blue-400 mb-4">
					by {{ $article->user->name }} on {{ $article->category->name }}.
					{{ $article->created_at->diffForHumans() }}
				</span>
				<p class="px-5 truncate">{{ strip_tags($article->content) }}</p>
				<div class="py-3 px-5">
					<form action="{{ route('articles.destroy', $article->id) }}" method="post">
						@csrf
						@method("DELETE")
						<a href="{{ route('articles.show', $article->id) }}" class="bg-cyan-500 py-1.5 px-4 rounded-lg shadow-lg text-slate-800 hover:bg-cyan-700 hover:text-white">Detail</a>
						<a href="{{ route('articles.edit', $article->id) }}" class="bg-green-500 py-1.5 px-4 rounded-lg shadow-lg text-slate-800 hover:bg-green-700 hover:text-white">Edit</a>
						<button type="submit" class="bg-red-500 py-1 px-4 rounded-lg shadow-lg text-slate-800 hover:bg-red-700 hover:text-white">Delete</button>
					</form>
				</div>
			</div>
			<div class="w-4/12 border-l-2">
				<img src="{{ asset("storage/" . $article->image) }}" alt="Image">
			</div>
		</div>
	@endforeach --}}

</div>
@endsection