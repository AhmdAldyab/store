<li class="nav-item">
    <div class="dropdown">
        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
          Order
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{route('order.add')}}">Add order</a></li>
          <li><a class="dropdown-item" href="{{route('orderCustomer.show')}}">orders</a></li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <div class="dropdown">
        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
          Item
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{route('acc.item.index')}}">Items</a></li>
          <li><a class="dropdown-item" href="{{route('item.create')}}">Add item</a></li>
        </ul>
    </div>
</li>
