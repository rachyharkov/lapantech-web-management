<?php

namespace App\Http\Livewire\Admin;

use App\Models\PostComment;
use Livewire\Component;

class WidgetCountComments extends Component
{
    public $totalComments;

    public function render()
    {
        $this->totalComments = PostComment::count();
        return view('livewire.admin.widget-count-comments');
    }
}
