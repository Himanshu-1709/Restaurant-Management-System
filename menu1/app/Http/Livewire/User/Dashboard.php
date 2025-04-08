<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use App\Models\Category;
use App\Models\Item;
use Auth;
use Carbon\Carbon;

class Dashboard extends Component
{
    protected $listeners = ['refreshComponentdashboard' => 'render'];
         
    public function render()
    {
        $user = Auth::user();
        $order_today_count = Order::where('user_id',$user->id)->whereDate('created_at', Carbon::today())->count();
        $order_yesterday_count = Order::where('user_id',$user->id)->whereDate('created_at', Carbon::yesterday())->count();
        $category_count = Category::where('user_id',$user->id)->count();
        $item_count = Item::where('user_id',$user->id)->count();
        return view('livewire.user.dashboard', compact('order_today_count','order_yesterday_count','category_count','item_count'));
    }
}
