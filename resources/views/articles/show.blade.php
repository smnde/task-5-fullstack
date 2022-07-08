@extends('layouts.app')
@section('content')
<div class="px-28">
	<div class="w-full bg-white shadow-lg rounded-lg overflow-hidden">
		<div class="flex justify-center items-center py-8 mb-10">
			<img class="object-contain w-full h-40" src="{{ asset('storage/' . $article->image) }}" alt="Image">
		</div>
		<div class="px-8">
			<h1 class="text-slate-800 font-semibold capitalize text-xl text-center mb-5">
				{{ $article->title }}
			</h1>
			<article class="mb-10">
				{!! $article->content !!}
			</article>

			<span class="mb-5 block">
				<a class="text-sky-500" href="{{ URL::previous() }}"><< Go back</a>
			</span>
		</div>
	</div>
</div>
@endsection