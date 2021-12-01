<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request){
        $user = User::all();
        $user->load('roles');
            
        return view('user.index',compact('user'));
    }
}
