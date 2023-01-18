<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class WidgetQuickCreateDraft extends Component
{
    public $postTitle, $postContent;

    protected $rules = [
        'postTitle' => 'required|min:5',
        'postContent' => 'required|min:10',
    ];

    public function render()
    {
        return view('livewire.admin.widget-quick-create-draft');
    }

    public function savePostDraft() {
        $validatedDate = $this->validate();

        dd($validatedDate);
    }
}
