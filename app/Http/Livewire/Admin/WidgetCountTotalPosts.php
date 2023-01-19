<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;

class WidgetCountTotalPosts extends Component
{
    public $totalPosts;

    public function render()
    {
        $this->totalPosts = Post::count();
        return view('livewire.admin.widget-count-total-posts');
    }
}
