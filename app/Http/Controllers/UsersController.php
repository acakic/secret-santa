<?php

namespace App\Http\Controllers;

use App\Mail\SecreKeySend;
use Firebase\JWT\SignatureInvalidException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Firebase\JWT\JWT;


class UsersController extends Controller
{
    use HasFactory;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function showAllUsers()
    {
        $users = User::all();
        return view('pages.candidates', compact('users'));
    }

    public function imSantaTo(Request $request)
    {
        if ($request->input('key')) {
            session()->put('key', $request->input('key'));
        }
        if (Auth::user()) {
            return view('pages.imsantato', [
                'user' => Auth::user(),
            ]);
        }
        return redirect('/login')->with('error', 'Please Login to access restricted area.');
    }

    public function getMySanta(Request $request)
    {
        $user = User::find(Auth::id());
        $hash = $user->child_hash_info;

        $key = $request->input('key');  //key witch user enter to form!

        try {
            $decoded = JWT::decode($hash, $key, array('HS256'));
        } catch (SignatureInvalidException $e) {
            return view('pages.imsantato', [
                'error' => 'Invalid Secret Key, please try again with different key.',
                'user' => Auth::user(),
            ]);
        }

        if ($user->id != $decoded->user_id) {
            $child_user = User::find($decoded->user_id);
            return view('pages.imsantato', compact('child_user'));
        } else {
            return redirect('/imsantato');
        }

    }

}
