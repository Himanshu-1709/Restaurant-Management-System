<?php

namespace App\Http\Livewire\User\Orders;

use Livewire\Component;
use App\Models\Order;
use Auth;

class OrderList extends Component
{
    protected $listeners = ['refreshComponent' => 'render'];
    public $checked = [];
    public $selectedStatus;
    
    public function render()
    {
        $user = Auth::user();
        $ongoingorder = Order::where('user_id',$user->id)->with('orderItems.item')->latest()->first();
        $orders = Order::where('user_id',$user->id)->with('orderItems.item')->latest()->take(20)->get();
        // dd($orders);
        return view('livewire.user.orders.order-list', compact('orders','ongoingorder','user'));
    }
    
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
