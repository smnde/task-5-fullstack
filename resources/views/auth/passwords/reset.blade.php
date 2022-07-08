@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-center items-center">
	<div class="w-80 h-12 flex justify-center rounded-t-lg items-center text-xl text-slate-800 bg-sky-400 shadow-lg">
		Reset password
	</div>
	<div class="w-full max-w-xs">
		<form class="bg-white shadow-md rounded px-8 pt-4 pb-5 mb-4" action="{{ route('password.update') }}" method="POST">
			@csrf
			<input type="hidden" name="token" value="{{ $token }}">
			<div class="mb-3">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="email">
					Email
				</label>
				<input class="shadow appearance-none border focus:border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" name="email" placeholder="example@mail.com">
			</div>
			<div class="mb-3">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="password">
					Password
				</label>
				<input class="shadow appearance-none border focus:border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" placeholder="********">
			</div>
			<div class="mb-5">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
					Confirm password
				</label>
				<input class="shadow appearance-none border focus:border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" type="password" name="password_confirmation" placeholder="********">
			</div>
			<div class="flex items-center justify-between">
				<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
					Reset password
				</button>
			</div>
		</form>
	</div>
</div>
@endsection
