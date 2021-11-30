<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request){
        //validate
        // $request->validate([
        //     'email'=>'required|email',
        //     'password'=>'required',
        // ],[
        //     'email.required'=> 'Hãy nhập Email',
        //     'email.email'=> 'Email không đúng định dạng',
        //     'password.required'=> 'Hãy nhập Password',
        // ]);
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password], $request->remember)){
            return redirect(route('car.index'));
        }
        return back()->with('msg', 'Tài khoản/mật khẩu không chính xác');
    }
}