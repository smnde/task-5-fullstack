@extends('layouts.app')

@section('content')
	<div class="py-5 flex flex-col justify-center items-center">
		<div class="w-96 h-12 flex justify-center rounded-t-lg items-center text-xl text-slate-800 bg-sky-400 shadow-lg">
			Reset password
		</div>
		<div class="w-full max-w-sm">
			<form class="bg-white shadow-md rounded-b-lg px-8 pt-6 pb-8 mb-4" action="{{ route('password.email') }}" method="POST">
				@csrf
				<div class="mb-4">
					<label class="block text-gray-700 text-sm font-bold mb-2" for="email">
						Email
					</label>
					<input class="shadow appearance-none border focus:border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" name="email" placeholder="example@mail.com">
				</div>
				<div class="flex items-center justify-between w-full">
					<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
						Send
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection