<?php

namespace App\Http\Livewire\User\Plan;

use Livewire\Component;
use App\Models\Plan;

class PlanList extends Component
{
    public function render()
    {
        $result['list'] = Plan::all();
        return view('livewire.user.plan.plan-list', $result);
    }
}
