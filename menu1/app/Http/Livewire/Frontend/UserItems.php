<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\User;
use Session;
use Auth;
use DB;

class UserItems extends Component
{
    public $catId = 0;
    public $user_id;
    public $cart = [];
    public $name;
    public $mobile;
    public $tableNumber;
    public $showOrderForm = false;

    public function render()
    {
        // $items = Item::leftjoin('categories','items.cat_id','=','categories.id')
        //         ->select('items.*','categories.category_name')
        //         ->where('items.user_id', $this->user_id);

        // if ($this->catId != 0) {
        //     $items = $items->where('cat_id', $this->catId);
        // }

        // $items = $items->get();
        $categories = DB::table('categories')->where('user_id', $this->user_id)->get();

        $categorieswithitems = [];
        foreach ($categories as $oneCategory) {
            $categoryData = [
                'category_id' => $oneCategory->id,
                'category_name' => $oneCategory->category_name,
                'items' => []
            ];

            $itemsQuery = DB::table('items')->where('user_id', $this->user_id);

            if ($this->catId != 0) {
                $itemsQuery->where('cat_id', $this->catId);
            }

            $items = $itemsQuery->get();

            foreach ($items as $oneItem) {
                if($oneCategory->id == $oneItem->cat_id){
                    $itemData = [
                        'item_id' => $oneItem->id,
                        'item_name' => $oneItem->item_name,
                        'item_price' => $oneItem->item_price,
                    ];

                    $categoryData['items'][] = $itemData;
                }
            }

            $categorieswithitems[] = $categoryData;
        }
        // dd($finalItems);

        return view('livewire.frontend.user-items', compact('categories','categorieswithitems'));
    }

    public function mount(Request $request,$user_id){
        $this->user_id = $user_id;
        $this->tableNumber = base64_decode($request->get('table'));
        
    }

    public function allitems(){
        $this->catId = 0;
    }

    public function loadUserItems($categoryId)
    {
       $this->catId = $categoryId;
    }

    public function addToCart($itemId)
    {

        if (array_key_exists($itemId, $this->cart)) {
            $this->cart[$itemId]['qty']++;
        } else {
            $item = Item::find($itemId);
            $this->cart[$itemId] = [
                'item_name' => $item->item_name,
                'item_price' => $item->item_price,
                'qty' => 1,
            ];
        }
        Session::put('cart', $this->cart);
    }

    public function removeFromCart($itemId)
    {
        if (isset($this->cart[$itemId])) {
            // Decrement the quantity by 1
            $this->cart[$itemId]['qty']--;
    
            // Check if the quantity is now 0, and unset the item if true
            if ($this->cart[$itemId]['qty'] == 0) {
                unset($this->cart[$itemId]);
            }
        }
        Session::put('cart', $this->cart);
    }

    // public function placeOrder(){
    //     $this->validate([
    //         'name' => 'required',
    //         'mobile' => 'required',
    //         'tableNumber' => 'required',
    //     ]);

    //     return redirect()->route('user.login');
    // }
    
}
