<div>
    @if($ongoingorder != '')
   <div class="col-xl-12">
      <div class="card h-auto deliver-order">
         <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-4">
               <h4 class="cate-title mb-0">Ongoing Order</h4>
               <span>{{$ongoingorder->status}}</span>
            </div>
            <div class="row">
               @php
               $json_decode_user = json_decode($ongoingorder->user,true);
               $total = 0;
               @endphp
               <div class="col-xl-4 col-xxl-6 col-sm-6  border-right">
                  <div class="mb-md-2">
                     <h4 class="mb-0">Order #{{$ongoingorder->id}}</h4>
                     <p class="mb-0">June 1, 2020, 08:22 AM</p>
                  </div>
                  <div>
                     <h4 class="mb-0">Table No.</h4>
                     <h5 class="font-w600">{{$json_decode_user['tableNumber']}}</h5>
                  </div>
               </div>
               <div class="col-xl-4 col-xxl-6 col-sm-6 b-right">
                  <div class="order-menu">
                     <h4 class=" ms-0">Order Menu</h4>
                     @foreach($ongoingorder->orderItems as $list)
                     <div class="d-flex align-items-center mb-3 justify-content-xl-center justify-content-start">
                        <div>
                           <h6 class="font-w600 text-nowrap mb-0">{{$list->item->item_name}}</h6>
                           <p class="mb-0">x{{$list['qty']}}</p>
                        </div>
                        @php
                        $total += ($list->item->item_price)*$list['qty'];
                        @endphp
                        <h6 class="text-primary mb-0 ms-auto">+{{$list->item->item_price}} Rs.</h6>
                     </div>
                     @endforeach
                  </div>
               </div>
               <div class="col-xl-4 col-xxl-6 col-sm-6">
                  <div class="mb-md-2">
                     <h4 class="mb-0">Total</h4>
                     <p class="mb-0 cate-title text-primary">{{$total}} Rs.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @endif
   @if (session()->has('success'))
   <div class="alert alert-success">
      {{ session('success') }}
   </div>
   @endif
   @if (session()->has('danger'))
   <div class="alert alert-danger">
      {{ session('danger') }}
   </div>
   @endif
   @if(count($orders) > 0)
   <div class="col-xl-12">
      <div class="d-flex align-items-center justify-content-between flex-wrap">
         <h4 class="cate-title">Order History</h4>
         <div class="d-flex align-items-center">
            <select class="form-control default-select me-3 ms-0 mb-4 border" wire:change="complete" wire:model="selectedStatus">
               <option value="" selected disabled>Select Status</option>
               <option value="complete">Mark as Complete</option>
               <option value="canceled">Mark as Canceled</option>
               <option value="processing">Mark as Processing</option>
            </select>
         </div>
      </div>
      <div class="card h-auto">
         <!--<div class="card-body p-2">-->
         <!--     <div class="form-check style-3 me-3">-->
         <!--    <input class="form-check-input" type="checkbox" value="" id="checkAll">-->
         <!--</div>-->
         <div id="accordion-one" class="accordion style-1">
            @foreach($orders as $key=> $order)
            <div class="accordion-item">
               <div class="accordion-header collapsed" >
                  <div class="form-check style-3 me-3">
                     <input class="form-check-input" type="checkbox" value="{{$order->id}}" wire:model="checked">
                  </div>
                  <div data-bs-toggle="collapse" data-bs-target="#default_collapseOne{{$key}}">
                     <h4 class="font-w500 mb-0">Order #{{$order->id}}</h4>
                     <span>{{ \Carbon\Carbon::parse($order->created_at)->format('F j, Y, h:i A') }}</span>
                  </div>
                  @php
                  $json_decode_user = json_decode($order->user,true);
                  $total = 0;
                  @endphp
                  <div class="dliver-order-bx d-flex align-items-center">
                     <div>
                        <h6 class="font-w500">Customer: {{$json_decode_user['name']}}</h6>
                     </div>
                  </div>
                  <div>
                     <h6 class="font-w500">Table No: {{$json_decode_user['tableNumber'] == '' ? 'Not Found' : $json_decode_user['tableNumber']}}</h6>
                  </div>
                  <button class="btn btn-outline-success 
                     {{$order->status === 'complete' ? 'bgl-success' : 
                     ($order->status === 'canceled' ? 'bgl-danger' : 
                     ($order->status === 'processing' ? 'bgl-primary' : '')
                     )
                     }} me-5">
                  {{$order->status}}
                  </button>
                  <span class="accordion-header-indicator" data-bs-toggle="collapse" data-bs-target="#default_collapseOne{{$key}}"></span>
               </div>
               <div id="default_collapseOne{{$key}}" class="collapse accordion_body" data-bs-parent="#accordion-one">
                  <div class="row">
                     <div class="col-xl-3 col-xxl-6 col-sm-6 b-right style-1">
                        <div class="order-menu my-4 dlab-space">
                           <h4 class="">Order Menu</h4>
                           @foreach($order->orderItems as $list)
                           <div class="d-flex align-items-center justify-content-xl-center justify-content-lg-start  mb-2">
                              <div>
                                 <h6 class="font-w600 text-nowrap mb-0">{{$list->item->item_name}}</h6>
                                 <p class="mb-0">x{{$list['qty']}}</p>
                              </div>
                              @php
                              $total += ($list->item->item_price)*$list['qty'];
                              @endphp
                              <h6 class="text-primary mb-0 ps-3 ms-auto">+{{$list->item->item_price}}</h6>
                           </div>
                           @endforeach
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mt-4 ms-sm-0 ms-3">
                        <p class="fs-18 font-w500">Total</p>
                        <h4 class="cate-title text-primary">{{$total}} Rs.</h4>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
   @else
   <div class="alert alert-danger left-icon-big alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="mdi mdi-btn-close"></i></span>
        <span>
        <i class="fa-solid fa-xmark"></i>
    </span>
        </button>
        <div class="media">
            <div class="alert-left-icon-big">
                <span><i class="mdi mdi-alert"></i></span>
            </div>
            <div class="media-body">
                <h5 class="mt-1 mb-2">Order Not Found</h5>
                <p class="mb-0">Place your first order <a target="_blank" href="{{ url('/') . '/menu/' . $user->slug }}" class="text-blue">here</a></p>
            </div>
        </div>
    </div>
   @endif
</div>
</div>