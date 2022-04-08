<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
	public function index()
	{
		return view('auth.register');
	}
	public function store(Request $request)
	{
		// Request Validation
		$this->validate($request, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255',
			'password' => 'required|confirmed'
		]);

		// Store to DB
		User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password)
		]);

		// Login User
		auth()->attempt($request->only('email', 'password'));

		// Redirect
		return redirect()->route('dashboard');
	}
}
