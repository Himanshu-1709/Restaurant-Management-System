<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PlansController extends Controller
{
    public function index(){
        return view('user.plans.list');
    }
}
