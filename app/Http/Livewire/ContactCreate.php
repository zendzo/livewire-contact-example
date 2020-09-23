<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class ContactCreate extends Component
{
    public $name;
    public $phone;
    
    public function render()
    {
        return view('livewire.contact-create');
    }

    public function store()
    {
        if ($this->name == '' || $this->phone == '') {
            return;
        }

        $contact = Contact::create([
            'name' => $this->name,
            'phone' => $this->phone
        ]);

        $this->resetInput();

        $this->emit('contactStored', $contact);
    }

    public function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }
}