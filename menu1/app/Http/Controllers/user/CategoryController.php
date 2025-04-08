<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use DB;

class CategoryController extends Controller
{
    public function index(){
        $user = Auth::user();
        $result['category'] = Category::where('user_id',$user->id)->get();
        return view('user.category.list',$result);
    }

    // public function autocomplete(Request $request)
    // {
    // $query = $request->get('search');
    // // return  $query;
    // $result['category'] = Category::where(function ($queryBuilder) use ($query) {
    // $queryBuilder->orwhere('category_name', 'LIKE', "%$query%")
    //             ->orWhere('id', 'LIKE', "%$query%");
    //     })
    //     ->paginate(10);
    // return view('user.category.list', $result);
    // }

    public function manage_category(Request $request,$id=""){

        if($id>0){
            $category = Category::find($id);
            $result['category_id'] = $category->id;
            $result['category_name'] = $category->category_name;
            
        }else{
            $result['category_id'] = '';
            $result['category_name'] = '';
        }
        return view('user.category.manage_category',$result);
    }

    public function delete(Request $request,$id=""){
        $category = Category::find($id);
        $category->delete();
        return back();
    }
}
