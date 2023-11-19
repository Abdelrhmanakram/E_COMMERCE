<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect(){
        if (Auth::user()->role == "admin") {
            $products= Product::all();
            $users= User::all();
            return view('admin.home',compact('products','users'));
        } else {
            $products= Product::all();
            return view('user.home',compact('products'));
        }
    }
}
