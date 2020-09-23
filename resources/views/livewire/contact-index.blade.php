<div>
    @if (session()->has('message'))
        <div class="alert alert-{{strpos(session('message'), 'deleted') ? 'warning':'success'}}">
            {{ session('message') }}
        </div>
    @endif
    @if ($editContact)
        <livewire:contact-edit></livewire:contact-edit>
    @else
        <livewire:contact-create></livewire:contact-create>
    @endif
    <hr>
    <div class="row">
        <div class="col">
            <select wire:model="paginate" class="form-control sm w-auto">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
        </div>
        <div class="col">
            <input wire:model="search" type="text" class="form-control">
        </div>
    </div>
    <hr>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $key => $contact)
                <tr>
                    <td>{{ $key += 1 }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>
                        <button wire:click="getContact({{$contact->id}})" class="btn btn-sm btn-info text-white">Edit</button>
                        <button wire:click="destroy({{$contact->id}})" class="btn btn-sm btn-danger text-white">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $contacts->links() }}
</div>
