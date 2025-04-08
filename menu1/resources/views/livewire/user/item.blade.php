<div>
    <form wire:submit.prevent="store">
    <div class="modal-inside">
            <label for="item_desc" class="form-label">Category</label>
            <select class="form-control" wire:model="cat_id">
            <option selected>Select Category</option>
                @foreach($category as $list)
                <option value="{{$list->id}}">{{$list->category_name}}</option>
                @endforeach
            </select>
            @error('cat_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="modal-inside">
            <label for="item_name" class="form-label">Category Title</label>
            <input type="hidden" class="form-control" wire:model="item_id">
            <input type="text" class="form-control" wire:model="item_name" placeholder="Panner sak">
            @error('item_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="modal-inside">
            <label for="item_desc" class="form-label">Item Desc</label>
            <input type="text" class="form-control" wire:model="item_desc" placeholder="Panner sak">
            @error('item_desc') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="modal-inside">
            <label for="item_price" class="form-label">Item Price</label>
            <input type="number" class="form-control" wire:model="item_price" placeholder="110">
            @error('item_price') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="store">
                <span wire:loading wire:target="store">Loading...</span>
                <span wire:loading.remove wire:target="store">Save changes</span>
            </button>
        </div>
    </form>
</div>
