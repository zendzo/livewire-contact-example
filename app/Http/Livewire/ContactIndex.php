<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;

    public $editContact = false;

    public $paginate = 5;

    public $search;

    protected $listeners = [
        'contactStored' => 'handleContactStored',
        'contactUpdated' => 'handleContactUpdated'
    ];

    public function render()
    {
        return view('livewire.contact-index',[
            'contacts' => $this->search === null ?
            Contact::latest()->paginate($this->paginate) : 
            Contact::where('name','like','%'.$this->search.'%')->paginate($this->paginate),
        ]);
    }
    
    public function getContact($id)
    {
        $this->editContact = true;

        $contact = Contact::findOrfail($id);

        $this->emit('getContact', $contact);
    }

    public function destroy($id)
    {
        if ($id) {
            $contact = Contact::findOrfail($id);
            $contact->delete();
        }
        session()->flash('message', 'Contact was deleted');
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
