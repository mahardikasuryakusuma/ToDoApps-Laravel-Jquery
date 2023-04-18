<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }
    public function register(Request $request){
        $validatedData =$request->validate([
            'name'=>'required|max:20',
            'username'=>['required','min:3','unique:users'],
            // 'email'=>'required|email:dns|unique:users',
            'password'=>'min:6|required_with:password_confirm|same:password_confirm',
            'password_confirm'=>'required|min:6',
        ]);
        // dd($validatedData);
        $validatedData['password']=Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/')->with('status', 'Account has been successfully created');
    }
}
