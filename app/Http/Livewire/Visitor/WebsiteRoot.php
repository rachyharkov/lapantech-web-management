<?php

namespace App\Http\Livewire\Visitor;

use App\Models\Portofolio;
use Livewire\Component;

class WebsiteRoot extends Component
{
    public $page;
    public $projects;

    protected $listeners = ['changePage'];

    public function mount($page = 'home')
    {
        $this->projects = Portofolio::all() ?? [];

        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.visitor.website-root');
    }

    public function changePage($page)
    {
        $this->page = $page;
        $this->emit('urlChange', $page);

        if ($page == 'feedback') {
            $this->emit('feedbackFormHydrated');
        }

        if ($page == 'projects') {
            $this->emit('galleryPageLoad');
        }

    }
}
