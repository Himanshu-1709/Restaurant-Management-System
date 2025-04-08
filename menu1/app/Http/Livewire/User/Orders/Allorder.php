<?php

namespace App\Http\Livewire\User\Orders;

use Livewire\Component;
use App\Models\Order;
use Auth;

class Allorder extends Component
{
    public $search;
    protected $listeners = ['refreshComponent' => 'render'];
    public $checked = [];
    public $selectedStatus;

    public function render()
    {
        $user = Auth::user();
        $ongoingorder = Order::where('user_id',$user->id)->with('orderItems.item')->latest()->first();
        $orders = Order::where('user_id',$user->id)->with('orderItems.item')->latest()
        ->when($this->search, function ($query) {
            $query->where('user', 'LIKE', '%' . $this->search . '%')
                ->orWhere('status', 'LIKE', '%' . $this->search . '%');
        })
        ->take(20)->paginate(10);
        // dd($orders);
        return view('livewire.user.orders.allorder', compact('orders','ongoingorder','user'));
    }

    // public function autocomplete(Request $request)
    // {
    // $query = $request->get('search');

    // $data = Order::
    //     where(function ($queryBuilder) use ($query) {
    //         $queryBuilder->orwhere('user', 'LIKE', "%$query%")
    //             ->orWhere('status', 'LIKE', "%$query%")
    //             ->orWhere('id', 'LIKE', "%$query%");
               
    //     })
    //     ->paginate(10);
    // return view('admin.users.users',compact('data'));
    // }


    public function complete(){
        
        if(count($this->checked) > 0){
        Order::whereIn('id', $this->checked)->update(['status' => $this->selectedStatus]);
         $this->checked = [];
        session()->flash('success', 'Status updated successfully for selected order.');
        }else{
            session()->flash('danger', 'Please select order to change status.');
        }
       
    }

    
}



