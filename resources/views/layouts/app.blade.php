<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

	{{-- trix text editor --}}
	<link rel="stylesheet" href="{{ asset('css/trix.css') }}">
	<script src="{{ asset('js/trix.js') }}"></script>
	{{-- hide import file in text editor --}}
	<style>
		trix-toolbar [data-trix-button-group="file-tools"] {
			display: none;
		}
	</style>
</head>
<body class="bg-slate-200">
	<div id="app">
		<nav class="flex justify-between items-center py-5 px-8 bg-sky-500 text-slate-800 sticky top-0 z-100">
			<a class="hover:text-white mr-8 text-xl" href="{{ route('home') }}">MyBlog</a>
			@auth
				<div class="flex items-center gap-6 w-full justify-start">
					<a class="hover:text-white " href="{{ route('home') }}">All posts</a>
					<a class="hover:text-white " href="{{ route('categories.index') }}">Categories</a>
					<a class="hover:text-white " href="{{ route('articles.index') }}">Articles</a>
				</div>

				<div class="flex relative items-center w-full gap-2 justify-end text-white">
					<button class="capitalize peer">{{ Auth::user()->name }}</button>
					<span class="peer:transition ease-in duration-100 peer-focus:rotate-90">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
					  </svg>
					</span>
					
					<a class="p-2 px-4 w-40 bg-slate-200 absolute top-8 rounded-lg shadow-lg text-slate-800 opacity-0 peer-focus:opacity-100 peer:transition-opacity duration-200" href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();
					">
						Logout
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">	@csrf </form>
				</div>
				
					@endauth
			
			@guest
				<div class="flex items-center gap-4">
					<a class="hover:text-white" href="{{ route('login') }}">Login</a>
					<a class="hover:text-white" href="{{ route('register') }}">Register</a>
				</div>
			@endguest
			
		</nav>

		<div class="py-8 px-8">
			@yield('content')
		</div>
	</div>
</body>
</html>
