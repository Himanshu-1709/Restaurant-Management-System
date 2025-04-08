<div>
    <div class="dlabnav border-right">
        <div class="dlabnav-scroll">
            <p class="menu-title style-1"> Main Menu</p>
            <input type="text" id="categorySearch" placeholder="Search category" class="w-75 py-1 rounded-3 ms-5"
                style="border: none;">
            <hr class="w-75 ms-5 m-0">
            <ul class="metismenu" style="height: 500px; overflow-y: scroll; cursor: pointer;">
                @foreach($categories as $list)
                <li class="category-item">
                    <a wire:click="loadUserItems({{ $list->id }})" aria-expanded="false">
                        <span class="nav-text">{{ $list->category_name }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="content-body">
        <div class="row">
            <div class="col-xl-7">
                <div class="card me-2 h-auto ms-3">
                    <div class="card-body" style="height: 627px; overflow-y: scroll;">
                        <div class="tab-content ms-3" id="nav-tabContent">
                            <div class="tab-pane row fade show active" id="nav-order" role="tabpanel"
                                aria-labelledby="nav-order-tab">
                                <div class="row">
                                    <input type="text" id="itemSearch" placeholder="Search items"
                                        class="py-1 rounded-3 mx-1 me-5" style="border: none;">

                                    <hr>
                                    @foreach($categorieswithitems as $onecategory)
                                    @if(count($onecategory['items']) > 0)
                                    @foreach($onecategory['items'] as $item)
                                    <div class="col-lg-2 col-md-4 col-sm-6 p-1 item-box" wire:click.prevent="addToCart({{ $item['item_id'] }})">
                                        <div class="orderin-bx d-flex flex-column align-items-center justify-content-between"
                                            style="padding: 8%; height: 100px; overflow: hidden; text-overflow: ellipsis;">
                                            <a href="#" >
                                                <input type="text"
                                                    class="rounded-circle w-25 text-center float-end text-white"
                                                    style="background-color: #FC8019; border: none;"
                                                    value="{{ $item['item_id']}}">
                                                <h6
                                                    style="max-height: 40px; overflow: hidden; text-overflow: ellipsis;">
                                                    {{ $item['item_name']}}</h6>
                                                <span class="float-end" style="height: 30px; overflow: hidden;">{{
                                                    $item['item_price'] }}₹</span>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="card row border-0 mb-0">
                    <div class="card h-auto me-2 mb-1">
                        <div class="card-body" style="height: 350px; overflow-y: scroll;">
                            <div class="order-menu style-1 mt-3">
                                <h4 class="text-center mb-4">Order Menu</h4>
                                <div class="order-item mb-3">
                                    <div class="align-items-center">
                                        <div>
                                            @foreach($cart as $cartItem)
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="item-details col-7">
                                                    <h4 class="font-w600 text-nowrap mb-0">{{ $cartItem['item_name'] }}
                                                    </h4>
                                                    <p class="mb-0">Price: {{ $cartItem['item_price'] }} Rs.</p>
                                                </div>

                                                <div class="quantity-controls col-3 ms-auto d-flex"
                                                    style="border: none solid; border-radius: 5px;">
                                                    <button type="button" class="btn p-2 fs-3 btn-number"
                                                        style="justify-content: flex-end;"
                                                        wire:click="decrementQty('{{ $cartItem['item_id'] }}')">
                                                        <i class="bi bi-dash"></i>
                                                    </button>

                                                    <input type="text" name="quant"
                                                        class="form-control fs-4 h-25 mt-1 qtyinput text-white input-number"
                                                        readonly
                                                        style="width: 40px; text-align: center; background-color: #FC8019;"
                                                        wire:model="cart.{{ $cartItem['item_id'] }}.qty"
                                                        value="{{ $cartItem['qty'] }}" min="1" max="10">

                                                    <button type="button" class="btn p-1 fs-3 fw-bold btn-number"
                                                        wire:click="incrementQty('{{ $cartItem['item_id'] }}')">
                                                        <i class="bi bi-plus"></i>
                                                    </button>

                                                </div>
                                                <button type="button" class="btn px-2 col-1  py-1 mx-2"
                                                    wire:click="removeFromCart('{{ $cartItem['item_id'] }}')">
                                                    <i class="bi bi-x-square-fill fs-3"></i>
                                                </button>
                                            </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-2" style="opacity: 0.7" />

                        <div class="row mt-2 mx-2">
                            <div class="col-lg-4 mb-3 col-sm-4">
                                <div
                                    class="orderin-bx mb-0 d-flex flex-column align-items-center justify-content-between">
                                    <div>
                                        <h4>CASH</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div
                                    class="orderin-bx mb-0 d-flex flex-column align-items-center justify-content-between">
                                    <div>
                                        <h4>G-pay</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div
                                    class="orderin-bx mb-0 d-flex flex-column align-items-center justify-content-between">
                                    <div>
                                        <h4>CARD</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-0 card me-5"
                        style="background-color: #FC8019; height: calc(33% - 31px);  margin-bottom: 0rem; ">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="font-w500 text-white mb-0 mt-2 ">GST</h4>
                            <h4 class="cate-title text-white me-5 mt-2 ">
                                +{{ number_format($this-> gstAmount, 2) }} Rs.
                                ({{ $this-> gstPercentage}}%)
                            </h4>
                        </div>
                        <div class="row align-items-center">
                            <h4 class="font-w500 col-6 text-white mb-0 ">Discount</h4>
                            <input wire:model="setDefaultDiscount" type="text" class="form-control" style="width: 22%;"
                                placeholder="Enter discount">
                            <input type="checkbox" class="form-check-input col-1 ms-1" id="applyDiscount">
                            <h4 class="cate-title text-white col-2 mt-2 me-5" id="discountValue">-12.59</h4>
                        </div>

                        <div class="d-flex align-items-center justify-content-between"
                            style="background-color: #FC8019;">
                            <h4 class="font-w500 text-white mb-0 ">Total</h4>
                            <h4 class="cate-title text-white me-5">
                                <span class="float-right">&nbsp;&nbsp;{{ array_sum(array_map(function ($item) {
                                    return $item['item_price'] * $item['qty'];
                                    }, $cart)) }} Rs.</span>
                                </li>
                            </h4>
                        </div>

                        <div class="d-flex align-items-center justify-content-between"
                            style="background-color: #FC8019;">
                            <h4 class="font-w500 text-white mb-0">Grand Total</h4>
                            <h4 class="cate-title text-white me-5">
                                {{ number_format($this-> totalAmount, 2) }} Rs.
                            </h4>
                        </div>
                        <div class="text-center" style="margin-top: 6%">
                            <a href="javascript:void(0);" class="btn btn-outline-danger me-sm-4 me-2">Reject
                                Order</a>
                            <a href="javascript:void(0);" class="btn btn-primary">Accept Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("categorySearch").addEventListener("input", function () {
        var searchInput = this.value.toLowerCase();
        var categoryItems = document.getElementsByClassName("category-item");

        for (var i = 0; i < categoryItems.length; i++) {
            var categoryName = categoryItems[i].querySelector(".nav-text").textContent.toLowerCase();

            if (categoryName.includes(searchInput)) {
                categoryItems[i].style.display = "block";
            } else {
                categoryItems[i].style.display = "none";
            }
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("#itemSearch").on("input", function () {
            var searchInput = $(this).val().toLowerCase();
            var regex = new RegExp(searchInput, 'i'); // 'i' for case-insensitive match

            $(".item-box").each(function () {
                var itemName = $(this).find("h6").text().toLowerCase();
                // Check if the item name matches the search input using regex
                if (itemName.match(regex)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>