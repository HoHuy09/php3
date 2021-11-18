<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index(){
        $car = Car::all();
        return view('car.index',compact('car'));
    }
    public function addForm(){
        
        return view('car.add');
    }
    public function saveAdd(Request $request){
        $model = new Car();
        $model->fill($request->all());
        $model->save();
        return redirect(route('car.index'));
    }
    public function editForm($id){
        $model = Car::find($id) ;
        return view('car.edit',compact('model'));
    }
    public function saveEdit($id,Request $request){
        $model = Car::find($id);
        $model->fill($request->all());
        $model->save();
        return redirect(route('car.index'));
    }
    public function remove($id){
        Car::destroy($id);
        return redirect(route('car.index'));
    }
}
