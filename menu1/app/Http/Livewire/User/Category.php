<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Category as Categories;
use Auth;

class Category extends Component
{
    public $category_name;
    public $category_id;

    public function render()
    {
        return view('livewire.user.category.manage');
    }

    public function mount($category_id,$category_name){
        $category_id = $category_id;
        $category_name = $category_name;
    }

    public function store()
    {
        $this->validate([
            'category_name' => 'required|string|max:255',
        ]);
        $user = Auth::user();

        if ($this->category_id > 0) {
            // Update existing category
            $category = Categories::findOrFail($this->category_id);
            $category->update([
                'category_name' => $this->category_name,
            ]);
        } else {
            // Create new category
            Categories::create([
                'user_id' => $user->id,
                'category_name' => $this->category_name,
            ]);
        }
        

        session()->flash('success', 'Category create successful!');
        return redirect()->route('user.category.list'); // Change the redirect path as needed
    }
}
