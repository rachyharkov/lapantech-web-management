<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Mockery\Undefined;

class WidgetCountSubscribers extends Component
{

    public $totalSubscribers;

    public function render()
    {
        $this->totalSubscribers = '-';
        return view('livewire.admin.widget-count-subscribers');
    }
}
