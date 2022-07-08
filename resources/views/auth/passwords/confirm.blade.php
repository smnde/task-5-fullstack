@extends('layouts.app')

@section('content')
	<div class="py-5 flex flex-col justify-center items-center">
		<div class="w-96 h-12 flex justify-center rounded-t-lg items-center text-xl text-slate-800 bg-sky-400 shadow-lg">
			Confirm your password
		</div>
		<div class="w-full max-w-sm">
			<form class="bg-white shadow-md rounded-b-lg px-8 pt-6 pb-8 mb-4" action="{{ route('password.confirm') }}" method="POST">
				@csrf
				<div class="mb-3">
					<label class="block text-gray-700 text-sm font-bold mb-2" for="password">
						Password
					</label>
					<input class="shadow appearance-none border focus:border-blue-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" placeholder="********" />
				</div>
				<div class="flex items-center justify-between w-full">
					<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
						Confirm
					</button>
					@if (Route::has("password.request"))
						<a href="{{ url('forgot_password') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
							Forgot Password?
						</a>
					@endif
				</div>
			</form>
		</div>
	</div>
@endsection