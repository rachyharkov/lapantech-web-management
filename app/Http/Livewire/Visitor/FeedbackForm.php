<?php

namespace App\Http\Livewire\Visitor;

use Livewire\Component;

class FeedbackForm extends Component
{
    public $name, $token, $sektor, $komentar;
    public $submitted = false;

    protected $rules = [
        'name' => 'required',
        'token' => 'required',
        'sektor' => 'required',
        'komentar' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Nama wajib diisi',
        'token.required' => 'Token wajib diisi',
        'sektor.required' => 'Sektor wajib diisi',
        'komentar.required' => 'Komentar wajib diisi',
    ];


    public function booted()
    {
    }

    public function render()
    {
        return view('livewire.visitor.feedback-form');
    }

    public function sendFeedback()
    {
        $this->validate();
        // send email

        $this->reset(['name', 'token', 'sektor', 'komentar']);
        $this->submitted = true;
        $this->emit('feedbackFormSubmitted');
    }
}
