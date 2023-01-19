<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class WidgetCountUsers extends Component
{
    public $totalUsers;

    public function render()
    {
        $this->totalUsers = '-';
        return view('livewire.admin.widget-count-users');
    }
}
