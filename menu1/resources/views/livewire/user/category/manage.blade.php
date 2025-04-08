<div>
    <form wire:submit.prevent="store">
        <div class="modal-inside">
            <label for="category_name" class="form-label">Category Title</label>
            <input type="hidden" class="form-control" id="category_id" wire:model="category_id">
            <input type="text" class="form-control" id="category_name" wire:model="category_name" placeholder="Panjabi">
            @error('category_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="store">
                <span wire:loading wire:target="store">Loading...</span>
                <span wire:loading.remove wire:target="store">Save changes</span>
            </button>
        </div>
    </form>
</div>
