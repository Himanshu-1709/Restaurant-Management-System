<div>
                        <!-- Display order details form -->
                        <form wire:submit.prevent="placeOrder">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" wire:model="name">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile Number:</label>
                                <input type="text" class="form-control" wire:model="mobile">
                                @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" wire:model="tableNumber">
                                @error('tableNumber') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <br>
                            <center>
                                <button type="submit" class="btn btn-primary shadow text-white" wire:loading.attr="disabled" wire:target="placeOrder">
                                    <span wire:loading wire:target="placeOrder">Loading...</span>
                                    <span wire:loading.remove wire:target="placeOrder">Place Order</span>
                                </button>
                            </center>
                        </form>

                   
</div>
