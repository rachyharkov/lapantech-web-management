<?php

namespace App\Http\Livewire\Visitor;

use Livewire\Component;

class ContactForm extends Component
{
    public $name, $email, $phone, $message;

    public function render()
    {
        return view('livewire.visitor.contact-form');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required',
        ]);

        // send email

        $this->reset(['name', 'email', 'message', 'phone']);

        $this->emit('contactFormSubmitted');
    }
}
