<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
	{
		$request->validate([
			"name" => "string|min:3|max:100",
			"email" => "string|max:100|email|unique:users",
			"password" => "string|min:8|max:20",
		]);

		User::create([
			"name" => $request->name,
			"email" => $request->email,
			"password" => Hash::make($request->password),
		]);

		return response()->json(["message" => "Registrasi berhasil"]);
	}

	public function login(Request $request)
	{
		$credential = $request->validate([
			"email" => "required|string",
			"password" => "required|string",
		]);

		if(Auth::attempt($credential)) {
			$user = Auth::user();
			$token = $user->createToken("auth-token")->accessToken;
			return response()->json([
				"message" => "Login berhasil",
				"token" => $token,
			]);
		}
		return response()->json(["message" => "Email atau password salah"]);
	}

	public function logout(Request $request)
	{
		$request->user()->token()->where("id", $request->user()->currentAccessToken()->id)->delete();
		return response()->json(["message" => "Sudah log out"]);
	}
}
