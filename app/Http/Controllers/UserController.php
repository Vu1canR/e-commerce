<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Order;

class UserController extends Controller
{

    public function index()
        {
            $response =  response()->json(User::with(['orders'])->get());
            dd($response);
        }

    public function profile(){
    	$user = Auth::User();
    	return view('auth.profile')->with(compact('user'));
    }

    



    public function showOrders(){


        
    }
}
