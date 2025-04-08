<?php

namespace App\Http\Livewire\User\Item;

use Livewire\Component;
use App\Models\Item;
use App\Models\Category;
use Auth;

class ItemList extends Component
{
    public $search;
    public $checked = [];
    protected $listeners = ['refreshComponent' => 'render'];

    public function render()
    {
        $user = Auth::user();
        $item = Item::select('items.*','categories.category_name')
        ->leftjoin('categories','items.cat_id','=','categories.id')->where('items.user_id',$user->id)
        ->when($this->search, function ($query) {
            $query->where('item_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('items.id', 'LIKE', '%' . $this->search . '%');
        })
        ->paginate(10);
        return view('livewire.user.item.item-list', compact('item'));
    }

    public function delete(){
        
        if(count($this->checked) > 0){
            Item::whereIn('id', $this->checked)->delete();
            $this->checked = [];
            session()->flash('danger', 'Items deleted successfully for selected.');
        }else{
            session()->flash('danger', 'Please select order to change status.');
        }
        return redirect()->route('user.items.list');
    }
}
