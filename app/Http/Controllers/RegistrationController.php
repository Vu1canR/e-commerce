<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;


class RegistrationController extends Controller
{
    public function create(){

		return view('registration.register');

}

	public function store(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            // 'c_password' => 'required',
            // 'email' => 'required|email|unique:users',

        ]);

        // $file = $request->file('picture');
        // $picture_name = $file->getClientOriginalName();
        // $file->move(public_path('/images/profile-pictures'), $picture_name);
            
        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'picture' => $picture_name
        ]);

        
        

        auth()->login($user);

        return redirect('welcome');

    }

    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|max:50',
    //         'email' => 'required|email',
    //         'password' => 'required|min:6',
    //         'c_password' => 'required|same:password',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->errors()], 401);
    //     }

    //         $data = $request->only(['name', 'email', 'password']);
    //         $data['password'] = bcrypt($data['password']);

    //         $user = User::create($data);
    //         $user->is_admin = 0;

    //     return response()->json([
    //         'user' => $user,
    //         'token' => $user->createToken('bigStore')->accessToken,
    //     ]);
    // }

}

