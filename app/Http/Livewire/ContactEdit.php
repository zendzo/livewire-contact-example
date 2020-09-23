<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class ContactEdit extends Component
{
    protected $listeners = [
        'getContact' => 'showContact'
    ];

    public $name;
    public $phone;
    public $contactId;

    public function render()
    {
        return view('livewire.contact-edit');
    }

    public function showContact($contact)
    {
        $this->name = $contact['name'];
        $this->phone = $contact['phone'];
        $this->contactId = $contact['id'];
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'phone' => 'required|min:3|max:15'
        ]);
        
        if ($this->contactId) {
            $contact = Contact::findOrfail($this->contactId);
            $contact->update([
                'name' => $this->name,
                'phone' => $this->phone
            ]);
        }

        $this->emit('contactUpdated', $contact);
    }
}
