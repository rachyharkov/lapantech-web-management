<?php

namespace App\Http\Livewire\Admin;

use App\Models\PostCategory;
use Livewire\Component;

class WidgetCountPostCategories extends Component
{
    public $totalCategories;

    public function render()
    {
        $this->totalCategories = PostCategory::count();
        return view('livewire.admin.widget-count-post-categories');
    }
}
