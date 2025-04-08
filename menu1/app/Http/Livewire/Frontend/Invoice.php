<?php

namespace App\Http\Livewire\Frontend;
use Illuminate\Http\Request;

use Livewire\Component;
use App\Models\Order;
use Session;
use Auth;
use App\Models\User;
use DB;
use PDF;



class Invoice extends Component
{   

    public function render(Request $request)
    {   $user = Auth::user();
        $table = $request->get('table');
         $ongoingorder = Order::where('user_id',$user->id)->with('orderItems.item')->latest()->first();
        return view('livewire.frontend.invoice',['ongoingorder' => $ongoingorder,'slug' => $user->slug,'table' => $request->table]);
    }

    public function generatePDF()
    {
        $user = Auth::user();
        $ongoingorder = Order::where('user_id',$user->id)->with('orderItems.item')->latest()->first();
        $imgSrc = public_path('user/assets/logos/'.auth()->user()->logo);
        $itemCount = $ongoingorder->orderItems->count();
        $itemCounts = $itemCount*1.2;
        $pdf = PDF::loadView('livewire.pdf.invoicepdf', compact('ongoingorder','imgSrc'));
     
        return $pdf->stream('invoice.pdf');
    }
}
