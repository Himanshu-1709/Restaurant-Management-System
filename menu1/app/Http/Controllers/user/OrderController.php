<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   public function index(){
        return view('user.order.list');
   }
   public function allorder(){
        return view('user.order.allorder');
   }
}
