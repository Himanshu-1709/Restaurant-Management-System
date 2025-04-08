<div>

<div class="row">
            <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                <a href="{{route('user.orders.list')}}">
                    <div class="widget-stat card">
                        <div class="card-body p-4">
                            <div class="media ai-icon">
                                <!-- <span class="me-3 bgl-primary text-primary">
                                    <i class="ti-user"></i>
                                </span> -->
                                <div class="media-body">
                                    <p class="mb-1">Today Order</p>
                                    <h4 class="mb-0">{{$order_today_count}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
			</div>
            <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                <a href="{{route('user.category.list')}}">
                    <div class="widget-stat card">
                        <div class="card-body p-4">
                            <div class="media ai-icon">
                                <div class="media-body">
                                    <p class="mb-1">Total Category</p>
                                    <h4 class="mb-0">{{$category_count}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
			</div>
            <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                <a href="{{route('user.items.list')}}">
                    <div class="widget-stat card">
                        <div class="card-body p-4">
                            <div class="media ai-icon">
                                <div class="media-body">
                                    <p class="mb-1">Total Items</p>
                                    <h4 class="mb-0">{{$item_count}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
			</div>
</div>
</div>
