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
}
