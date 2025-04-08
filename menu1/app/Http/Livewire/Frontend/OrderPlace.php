<?php

namespace App\Http\Livewire\Frontend;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Order;
use Session;
use Auth;
use App\Models\User;
use App\Events\OrderNotificationEvent;
use DB;

class OrderPlace extends Component
{
    public $name;
    public $mobile;
    public $tableNumber;
    public $cart = [];
    public $user_id;
    
    public function render()
    {
        return view('livewire.frontend.order-place');
    }
    // public function placeOrder(Request $request){
    //     $validatedData = $this->validate([
    //         'name' => 'required|string|max:255', // Adjust the max length as needed
    //         'mobile' => 'required|digits:10',
    //         'tableNumber' => 'required|numeric|max:999', // Assuming table number is numeric
    //     ]);
    //     $this->cart = session()->has('cart') ? session('cart') : [];
    //     $user = User::where('id',$this->user_id)->first();

    //     $Order = new Order;
    //     $Order->user_id = $user->id;
    //     $Order->user = json_encode($validatedData);
    //     $Order->cart = json_encode($this->cart);
    //     $Order->save();
        
    //     event(new OrderNotificationEvent('New Order Recived 🥳',$this->user_id));

    //     $request->session()->flash('message','Order Placed Succsessfully.');
    //     return redirect()->route('menu',$user->slug);
    // }
    public function placeOrder(Request $request){
        
        $validatedData = $this->validate([
            'name' => 'required|string|max:255', // Adjust the max length as needed
            'mobile' => 'required|digits:10',
            // 'tableNumber' => 'required|numeric|max:999', // Assuming table number is numeric
        ]);
        $userdata = [
            'name' => $this->name,
            'mobile' => $this->mobile,
            'tableNumber' => $this->tableNumber,
            ];
        $this->cart = session()->has('cart') ? session('cart') : [];
        $user = User::where('id',$this->user_id)->first();

        $Order = new Order;
        $Order->user_id = $user->id;
        $Order->user = json_encode($userdata);
        // $Order->cart = json_encode($this->cart);
        $Order->save();
        $Order->id;
        $newOrderItemsData = []; // Initialize an empty array to collect order items data

        foreach ($this->cart as $index => $oneitem) {
            $newOrderItemsData[] = [
                'order_id' => $Order->id,
                'item_id' => $index,
                'qty' => $oneitem['qty'],
                // Add other item-related data if needed
            ];
        }

        // Use createMany after the loop to insert all order items at once
        $Order->orderItems()->createMany($newOrderItemsData);
        
        event(new OrderNotificationEvent('New Order Recived 🥳',$this->user_id));

        $request->session()->flash('message','Order Placed Succsessfully.',);
        // return redirect()->route('menu',['slug' => $user->slug,'table' =>base64_encode($this->tableNumber)]);
        return redirect()->route('user.invoice',['order_id' => $Order->id ,'table' =>base64_encode($this->tableNumber)]);
        }
    
    
}
