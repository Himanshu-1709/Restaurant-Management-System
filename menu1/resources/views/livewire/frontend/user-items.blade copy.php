<div>
    <div class="container">
        <div class="horizontal-scroll">
            @foreach($category as $list)
                <div class="category-item bg-primary text-white" wire:click="loadUserItems({{ $list->id }})">
                    {{ $list->category_name }}
                </div>
            @endforeach
        </div>
    </div>

    <div class="card">
        <ul class="list-group list-group-flush">
            @foreach($items as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $item->item_name }}<br>
                    {{ $item->item_price }}
                    <div class="input-group" style="width: 115px;">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-danger btn-number" wire:click="removeFromCart({{ $item->id }})">
                                <span class="glyphicon glyphicon-minus">-</span>
                            </button>
                        </span>
                        <input type="number" name="quant[{{ $item->id }}]" class="form-control input-number" readonly wire:model="cart.{{ $item->id }}.qty" value="0" min="1" max="10">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-primary btn-number" wire:click="addToCart({{ $item->id }})">
                                <span class="glyphicon glyphicon-plus">+</span>
                            </button>
                        </span>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="fixed-bottom">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Total
                    <div class="input-group" style="width: 125px;">
                        {{ array_sum(array_map(function ($item) {
                            return $item['item_price'] * $item['qty'];
                        }, $cart)) }}
                    </div>
                </li>
            </ul>

            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#cartModal">
                View Cart
            </button>
        </div>

        <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cartModalLabel">Cart Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Display cart details here -->
                        <ul class="list-group list-group-flush">
                            @foreach($cart as $cartItem)
                                <li class="list-group-item">
                                    {{ $cartItem['item_name'] }} * {{ $cartItem['qty'] }}
                                    <span class="float-right">{{ $cartItem['item_price'] * $cartItem['qty'] }} Rs.</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <li class="list-group-item">
                            Total:
                            <span class="float-right">&nbsp;&nbsp;{{ array_sum(array_map(function ($item) {
                                return $item['item_price'] * $item['qty'];
                            }, $cart)) }} Rs.</span>
                        </li>
                    </div>

                    <?php
                    $totalCartAmount = array_sum(array_map(function ($item) {
                        return $item['item_price'] * $item['qty'];
                    }, $cart));
                    ?>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ordermodal" <?php echo ($totalCartAmount <= 0) ? 'disabled' : ''; ?>>
                        Place Order
                    </button>
                </div>
            </div>
        </div>
        
        <div>
     <div class="modal fade" id="ordermodal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderModalLabel">Order Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <livewire:frontend.order-place :user_id="$user_id"/>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
</div>
