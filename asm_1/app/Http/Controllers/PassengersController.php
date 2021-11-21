<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PassengersController extends Controller
{
    public function index(){
        $passenger = Passenger::all();
        return view('passenger.index',compact('passenger'));
    }
    public function addForm(){
        $car = Car::all();
        return view('passenger.add',compact('car'));
    }
    public function saveAdd(Request $request){
        $model = new Passenger();
        $model->fill($request->all());
        if($request->hasFile('image')){
            $oldImg = str_replace('storage/', 'public/', $model->image);
            Storage::delete($oldImg);

            $imgPath = $request->file('image')->store('public/products');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $model->avatar = $imgPath;
        }
        $model->save();
        return redirect(route('passenger.index'));
    }
    public function editForm($id){
        $car = Car::all();
        $model = Passenger::find($id) ;
        
        return view('passenger.edit',compact('model','car'));
    }
    public function saveEdit($id,Request $request){
        $model = Passenger::find($id);
        $model->fill($request->all());
        if($request->hasFile('image')){
            $oldImg = str_replace('storage/', 'public/', $model->image);
            Storage::delete($oldImg);

            $imgPath = $request->file('image')->store('public/products');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $model->avatar = $imgPath;
        }
        $model->save();
        return redirect(route('passenger.index'));
    }
    public function remove($id){
        Passenger::destroy($id);
        return redirect(route('passenger.index'));
    }
}
