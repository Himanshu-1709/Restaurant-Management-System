<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Item as items;
use App\Models\Category;
use Auth;

class Item extends Component
{
    public $item_id;
    public $cat_id;
    public $item_name;
    public $item_desc;
    public $item_price;
    public $category = [];

    public function render()
    {
        return view('livewire.user.item');
    }

    public function mount($item_id,$cat_id,$item_name,$item_desc,$item_price){
        $item_id = $item_id;
        $cat_id = $cat_id;
        $item_name = $item_name;
        $item_desc = $item_desc;
        $item_price = $item_price;
        $user = Auth::user();
        $this->category = Category::where('user_id',$user->id)->get();
    }

    public function store()
    {
        $this->validate([
            'cat_id' => 'required',
            'item_name' => 'required',
            'item_desc' => 'required',
            'item_price' => 'required',
        ]);
        $user = Auth::user();

        if ($this->item_id > 0) {
            // Update existing category
            $items = items::findOrFail($this->item_id);
            $items->update([
                'cat_id' => $this->cat_id,
                'item_name' => $this->item_name,
                'item_desc' => $this->item_desc,
                'item_price' => $this->item_price,
            ]);
        } else {
            // Create new category
            items::create([
                'user_id' => $user->id,
                'cat_id' => $this->cat_id,
                'item_name' => $this->item_name,
                'item_desc' => $this->item_desc,
                'item_price' => $this->item_price,
            ]);
        }
        return redirect()->route('user.items.list'); // Change the redirect path as needed
    }
}
