<div>
   <div class="container">
      <div class="row">
         <div class="col-4"><i class="bi bi-1-circle  fs-1"></i></div>
         <div class="col-4">
            <center><b class="fs-4">Menu</b></center>
         </div>
         <div class="col-4"><i class="bi bi-info-circle-fill float-end  fs-1"></i></div>
      </div><br>
      <div class="">
         <h3 class="m-0">Let's Go</h3>
      </div><br>
      <div class="cards-wrapper">
         <div class="card1" wire:click="allitems">All</div>
         @foreach($categories as $list)
         <div class="card1" wire:click="loadUserItems({{ $list->id }})">{{ $list->category_name }}</div>
         @endforeach
      </div>
      
      @foreach($categorieswithitems as $onecategory)
      @if(count($onecategory['items']) > 0)
      <div class="">
         <h5>{{$onecategory['category_name']}}</h5>
      </div>
      @foreach($onecategory['items'] as $item)
      <div class="container p-1 box mt-1">
         <div class="row">
            <div class="col-7">
               {{$item['item_name']}}
               <div class="">{{ $item['item_price'] }}</div>
            </div>
            <div class="col-5">
               <div class="col-sm-9 float-end">
                  <div class="qty">
                     <button type="button" class="btn btn-sm btn-number" wire:click="removeFromCart({{ $item['item_id'] }})">
                     <i class="bi bi-dash"></i>
                     </button>
                     <input type="text" name="quant[{{ $item['item_id'] }}]"  class="form-control qtyinput input-number" readonly wire:model="cart.{{ $item['item_id'] }}.qty" value="0" min="1" max="10">
                     <button type="button" class="btn btn-sm btn-number" wire:click="addToCart({{ $item['item_id'] }})">
                     <i class="bi bi-plus"></i>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endforeach 
      <hr class="mb-4">
      @endif
      @endforeach
      
      <nav class="navbar navbar-dark fixed-bottom bg-custom-2  p-0" data-bs-toggle="modal" data-bs-target="#cartModal" style="max-width: 500px; margin: auto;">
         <a class="navbar-brand" >
            <div class="order">
               View Order  
         </a>
         </div>
         <i class="bi bi-chevron-right float-end fs-4 me-2 text-center text-light"></i>
      </nav>
   </div>
   <!-- Modal -->
   <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <ul class="list-group list-group-flush">
                  @foreach($cart as $cartItem)
                  <li class="list-group-item">
                     {{ $cartItem['item_name'] }} * {{ $cartItem['qty'] }}
                     <span class="float-end">{{ $cartItem['item_price'] * $cartItem['qty'] }} Rs.</span>
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
            <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#orderModal" <?php echo ($totalCartAmount <= 0) ? 'disabled' : ''; ?>>
            Place Order
            </button>
         </div>
      </div>
   </div>
   <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <livewire:frontend.order-place :user_id="$user_id" :tableNumber="$tableNumber"/>
            </div>
         </div>
      </div>
   </div>
</div>