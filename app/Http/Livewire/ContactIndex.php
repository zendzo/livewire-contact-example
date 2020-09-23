<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class ContactIndex extends Component
{
    protected $listeners = [
        'contactStored' => 'handleContactStored'
    ];

    public function render()
    {
        return view('livewire.contact-index',[
            'contacts' => Contact::latest()->get(),
        ]);
    }

    public function handleContactStored($contact)
    {
        session()->flash('message', 'Contact '.$contact['name'].'  Successfully Created');
    }
}
