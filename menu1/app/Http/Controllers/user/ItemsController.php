<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Auth;
class ItemsController extends Controller
{
    public function index(){
        $user = Auth::user();

        $result['item'] = Item::select('items.*','categories.category_name')->leftjoin('categories','items.cat_id','=','categories.id')->where('items.user_id',$user->id)->get();
        return view('user.item.list',$result);
    }
    public function manage_items(Request $request,$id=""){
        $user = Auth::user();
        if($id>0){
            $Item = Item::find($id);
            $result['id'] = $Item->id;
            $result['cat_id'] = $Item->cat_id;
            $result['item_name'] = $Item->item_name;
            $result['item_desc'] = $Item->item_desc;
            $result['item_price'] = $Item->item_price;
            
        }else{
            $result['id'] = "";
            $result['cat_id'] = "";
            $result['item_name'] = "";
            $result['item_desc'] = "";
            $result['item_price'] = "";
        }
        return view('user.item.manage_item',$result);
    }

    public function delete(Request $request,$id=""){
        $Item = Item::find($id);
        $Item->delete();
        return back();
    }
}
