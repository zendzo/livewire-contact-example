<div>
    <form action="#">
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <input type="text" wire:model.lazy="name" class="form-control" placeholder="Name">
                </div>
                <div class="col">
                    <input type="text" wire:model.lazy="phone" class="form-control" placeholder="+62xxxx">
                </div>
            </div>
        </div>
        <button wire:click="store" class="btn btn-sm btn-primary">Save</button>
        {{$name}}{{$phone}}
    </form>
</div>
