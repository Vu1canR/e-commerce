<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class SessionsController extends Controller
{

	public function __construct()
	{

		// $this->middleware('guest', ['except' => 'logout']);
	}

	public function showLoginForm()
	{

		return view('sessions.login');
	}


	public function login(Request $request)
	{

		$rules = [
			'email' => 'required',
			'password' => 'required',
		];

		$request->validate([
			'email' => 'required',
			'password' => 'required',
		]);

		$customMessages = [
			'name.required' => 'Enter email',
			'password.required' => 'Enter password',
		];

		$this->validate($request, $rules, $customMessages);

		$credentials = $request->only('email', 'password');

		if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
			return redirect()->back();
		} else
			return redirect('/welcome');
		// $products = Product::inRandomOrder()->limit(5)->get();

		// return view('/welcome', compact('products'));
	}



	public function logout()
	{

		try {
			Auth::logout();
			echo "logout successfully";
			return redirect('/welcome');
		} catch (Exception $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}

	public function showProfile($userId)
	{

		$auserId = Auth::user()->id;
		$user = User::find($auserId);
		if ($auserId != $userId) {
			return abort(404);
		} else {
			$orders = Order::where('user_id', $auserId)->with('productsList')->get();
			return view('profile', compact('orders', 'user'));
		}
	}
}
