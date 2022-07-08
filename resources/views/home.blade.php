@extends('layouts.app')
@section('content')
	<div class="w-full px-28">
		<div class="flex justify-center items-center py-5 mb-5">
			<form action="{{ route("home") }}" method="GET" class="flex w-full">
				<input class="shadow appearance-none border focus:border-blue-500 rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="search" type="text" name="search" placeholder="Search title" value="{{ old("search", request("search")) }}" />
				<button class="shadow appearance-none rounded py-3 px-5 ml-2 leading-tight bg-blue-600 text-white hover:bg-blue-700">Search</button>
			</form>
		</div>

		@foreach ($articles as $article)
		<a href="{{ route('detail', $article->id) }}" class="px-5 mb-2 w-full flex items-center flex-wrap h-16 bg-white rounded-lg shadow-xl hover:bg-sky-400 hover:text-white">
			<span class="text-xl font-semibold w-full">{{ $article->title }}</span>
			<span class="text-sm italic capitalize">
				by {{ $article->author->name }}
				on {{ $article->category->name }}.
				{{ $article->created_at->diffForHumans() }}
			</span>
		</a>
	@endforeach
	</div>
@endsection