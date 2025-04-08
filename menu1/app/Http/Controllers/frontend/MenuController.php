<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Item;

class MenuController extends Controller
{
   public function index(Request $request,$slug){

   $result['user'] = User::where('slug',$slug)->first();
   // $result['category'] = Category::where('user_id',$result['user']->id)->get();
   // $result['items'] = Item::where('user_id',$result['user']->id)->get();
   
   return view('frontend.menu2',$result);
   }
}
