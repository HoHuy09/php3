<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index(Request $request){
        $user = User::all();
        $user->load('roles');  
        return view('user.index',compact('user'));
    }
    public function addForm(){
        $roles = Role::all();
        return view('user.add',compact('roles'));
    }
    public function saveAdd(Request $request){
        $model = new User();
        $model->fill($request->all());
        if($request->hasFile('image')){
            $imgPath = $request->file('image')->store('products');
            $imgPath = str_replace('public/', '', $imgPath);
            $model->avatar = $imgPath;
        }
        
        $model->save();
        return redirect(route('user.index'));
    }
    public function editForm($id,Request $request){  
        $user = User::find($id);
        $roles = Role::all();
        return view('user.edit',compact('roles','user'));
    }
    public function saveEdit($id,Request $request){
        $model = User::find($id);
        $model->fill($request->all());
        if($request->hasFile('image')){
            Storage::delete($model->image);

            $imgPath = $request->file('image')->store('products');
            $imgPath = str_replace('public/', '', $imgPath);
            $model->avatar = $imgPath;
        }
       
        $model->save();
        return redirect(route('user.index'));
    }
    public function remove($id){
        User::destroy($id);
        return redirect(route('user.index'));
    }
}
