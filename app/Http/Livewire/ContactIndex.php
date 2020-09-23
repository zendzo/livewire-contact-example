<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class ContactIndex extends Component
{
    public $editContact = false;

    protected $listeners = [
        'contactStored' => 'handleContactStored',
        'contactUpdated' => 'handleContactUpdated'
    ];

    public function render()
    {
        return view('livewire.contact-index',[
            'contacts' => Contact::latest()->get(),
        ]);
    }
    
    public function getContact($id)
    {
        $this->editContact = true;

        $contact = Contact::findOrfail($id);

        $this->emit('getContact', $contact);
    }

    public function handleContactStored($contact)
    {
        session()->flash('message', 'Contact '.$contact['name'].'  Successfully Created');
    }

    public function handleContactUpdated($contact)
    {
        $this->editContact = false;
        
        session()->flash('message','Contact '.$contact['name'].' Updated Successfully');
    }
}
