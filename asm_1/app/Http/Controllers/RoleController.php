<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request){
        $role = Role::all();
        
        return view('role.index',compact('role'));
    }
    public function addForm(){
        
        return view('role.add');
    }
    public function saveAdd(SaveRoleRequest $request){
        $model = new Role();
        $model->fill($request->all());
        $model->save();
        return redirect(route('role.index'));
    }
    public function editForm($id,Request $request){  
        $roles = Role::find($id);
        return view('role.edit',compact('roles'));
    }
    public function saveEdit($id,SaveRoleRequest $request){
        $model = Role::find($id);
        $model->fill($request->all());
       
        $model->save();
        return redirect(route('role.index'));
    }
    public function remove($id){
        Role::destroy($id);
        return redirect(route('role.index'));
    }
}
