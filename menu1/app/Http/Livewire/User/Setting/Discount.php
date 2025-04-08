<?php

namespace App\Http\Livewire\User\Setting;

use DB;
use Livewire\Component;

class Discount extends Component
{
    public $percentage;
    public $payment;
    public function render()
    {
        return view('livewire.user.setting.discount');
    }

    public function mount()
    {
        // Additional logic if needed
        $this->emit('showDiscountPage');
    }


   

}
