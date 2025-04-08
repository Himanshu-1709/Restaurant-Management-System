<?php

namespace App\Http\Livewire\User\Pos;

use Livewire\Component;
use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\Category;
use App\Models\User;
use Session;
use Auth;
use DB;


class Pos extends Component
{

    public $catId = 0;
    public $user_id;
    public $cart = [];
    public $name;
    public $mobile;
    public $tableNumber;
    public $showOrderForm = false;
    public $totalAmount;
    public $gstPercentage;
    public $gstAmount;
    public function render()
    {
        $categories = DB::table('categories')->where('user_id', 6)
            ->orderBy('category_name', 'asc')
            ->get();

        $categorieswithitems = [];
        foreach ($categories as $oneCategory) {
            $categoryData = [
                'category_id' => $oneCategory->id,
                'category_name' => $oneCategory->category_name,
                'items' => []
            ];

            $itemsQuery = DB::table('items')
                ->where('user_id', 6)
                ->orderBy('item_name', 'asc');

            if ($this->catId != 0) {
                $itemsQuery->where('cat_id', $this->catId);
            }

            $items = $itemsQuery->get();

            foreach ($items as $oneItem) {
                if ($oneCategory->id == $oneItem->cat_id) {
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

        return view('livewire.user.pos.pos', compact('categories', 'categorieswithitems'));
    }

    public function allitems()
    {
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
                'item_id' => $itemId, // Add 'item_id' here
                'item_name' => $item->item_name,
                'item_price' => $item->item_price,
                'qty' => 1,
            ];
        }

        $this->calculateTotalAmount();
        session(['cart' => $this->cart]);
    }
    private function calculateTotalAmount()
    {
        $subtotal = array_sum(array_map(function ($item) {
            return $item['item_price'] * $item['qty'];
        }, $this->cart));

        $this->gstPercentage = 5; 
        $this->gstAmount = ($subtotal * $this->gstPercentage) / 100;
        $this->totalAmount = $subtotal + $this->gstAmount;
    }
    public function incrementQty($itemId)
    {
        if (isset($this->cart[$itemId])) {
            $this->cart[$itemId]['qty']++;
            $this->calculateTotalAmount();
            session(['cart' => $this->cart]);
        }
    }

    public function decrementQty($itemId)
    {
        if (isset($this->cart[$itemId]) && $this->cart[$itemId]['qty'] > 1) {
            $this->cart[$itemId]['qty']--;
            $this->calculateTotalAmount();
            session(['cart' => $this->cart]);
        }
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
}
