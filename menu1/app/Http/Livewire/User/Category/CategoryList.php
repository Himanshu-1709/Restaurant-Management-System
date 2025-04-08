<?php

namespace App\Http\Livewire\User\Category;

use Livewire\Component;
use Auth;
use App\Models\Category;
use App\Models\Item;
use App\Models\Order;

class CategoryList extends Component
{
    public $search;
    public $checked = [];
    protected $listeners = ['refreshComponent' => 'render'];

    public function render()
{
    $user = Auth::user();
    $category = Category::where('user_id', $user->id)
        ->when($this->search, function ($query) {
            $query->where('category_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('id', 'LIKE', '%' . $this->search . '%');
        })
        ->paginate(10);

    return view('livewire.user.category.category-list', compact('category'));
}

    public function delete(){
        dd($this->checked);
        if(count($this->checked) > 0){
            Category::whereIn('id', $this->checked)->delete();
            Item::whereIn('cat_id', $this->checked)->delete();
            $this->checked = [];
            session()->flash('danger', 'Category deleted successfully for selected.');
        }else{
            session()->flash('danger', 'Please select category to change status.');
        }
        return redirect()->route('user.category.list');
    }
}
