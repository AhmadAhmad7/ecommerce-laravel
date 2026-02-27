<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboardComponent extends Component
{


    public function render()
    {


        return view('livewire.user.user-dashboard-component')->layout('layouts.base');
    }
}
