<div class="dlabnav border-right">
    <div class="dlabnav-scroll">
        <p class="menu-title style-1"> Main Menu</p>
        <ul class="metismenu" id="menu">
            <li><a href="{{route('user.dashboard')}}" aria-expanded="false">
                    <i class="bi bi-shop-window"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a href="{{route('user.list')}}" aria-expanded="false">
                    <i class="bi bi-shop-window"></i>
                    <span class="nav-text">Pos</span>
                </a>
            </li>
            <li><a href="{{route('user.table')}}" class="" aria-expanded="false">
                    <i class="bi bi-table"></i>
                    <span class="nav-text">Table</span>
                </a>
            </li>
            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="bi bi-tag"></i>
                    <span class="nav-text">Catgory</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('user.category.add')}}">Add Category</a></li>
                    <li><a href="{{route('user.category.list')}}">Category List</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="bi bi-basket"></i>
                    <span class="nav-text">Items</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('user.items.add')}}">Add Item</a></li>
                    <li><a href="{{route('user.items.list')}}">Item List</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="bi-list-check"></i>
                    <span class="nav-text">Orders</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('user.orders.list')}}">Order List</a></li>
                    <li><a href="{{route('user.orders.allorder')}}">All Order</a></li>
                </ul>
            </li>
            <li><a href="{{route('user.plans.list')}}" class="" aria-expanded="false">
                    <i class="bi bi-gear-wide"></i>
                    <span class="nav-text">Plans</span>
                </a>
            </li>
            <li><a href="{{route('user.settings.list')}}" class="" aria-expanded="false">
                    <i class="bi bi-gear-wide"></i>
                    <span class="nav-text">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</div>