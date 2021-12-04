<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index(Request $request){
        $pageSize = 10;
       

        $keyword = $request->has('keyword') ? $request->keyword : "";
        

        // dd($keyword, $cate_id, $rq_column_names, $rq_order_by);
       $query = User::where('email', 'like', "%$keyword%")->orWhere('name', 'like', "%$keyword%");
        
        
        $user = $query->paginate($pageSize);
        // giữ lại các giá trị đang tìm kiếm trong link phần trang
        $user->appends($request->input());

        
        $searchData = compact('keyword');
        
        return view('user.index', compact('user', 'searchData'));
    }
    public function addForm(){
        $roles = Role::all();
        return view('user.add',compact('roles'));
    }
    public function saveAdd(SaveUserRequest $request){
        $model = new User();
        $model->fill($request->all());
        $model->password = Hash::make($request->password);
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
    public function saveEdit($id,SaveUserRequest $request){
        $model = User::find($id);
        $model->fill($request->all());
        $model->password = Hash::make($request->password);
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
