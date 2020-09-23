<div>
    <form action="#">
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <input type="text"
                    wire:model.lazy="name"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Name">
                    @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input type="text"
                    wire:model.lazy="phone"
                    class="form-control @error('phone') is-invalid @enderror"
                    placeholder="+62xxxx">
                    @error('phone')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <button wire:click="store" class="btn btn-sm btn-primary">Save</button>
    </form>
</div>
