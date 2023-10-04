<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Messages;

class CustomAuthController extends Controller
{
    public function login(Request $request){
        if ($request->input('key')) {
            session()->put('key', $request->input('key'));
        }
        return view('pages.login');
    }
    public function register(){
        return view('pages.register');
    }

    public function store(Request $request){
        $this->validation($request);
        $request['password'] = Hash::make($request['password']);
        $user = User::create($request->all());
        Auth::login($user);
        return redirect('/');
    }

    public function validation(Request $request){
//        dd($request->all());
        return $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:8|max:255',
            'address' => 'required|max:255',
        ]);
    }
    public function logindata(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
            ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,])){
            return redirect('/')->with('success', 'You have successfully logged in!');
        }
        return redirect('/login')->with('error', 'Wrong credentials!');


    }

    public function logout(Request $request){
        if(Auth::user()) {
            Auth::logout();
            return redirect("/")->with('success', 'You have been successfully logged out!');
        }
    }
}
