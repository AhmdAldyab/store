{{-- section --}}
<li class="nav-item">
    <div class="dropdown">
        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
          Section
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('section.index') }}">Sections</a></li>
        </ul>
    </div>
 </li>
{{-- item --}}
 <li class="nav-item">
    <div class="dropdown">
        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
          Item
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('item.index') }}">Items</a></li>
          <li><a class="dropdown-item" href="{{ route('item.ForPrice') }}">Items for price</a></li>
        </ul>
    </div>
  </li>

{{-- user --}}
<li class="nav-item">
    <div class="dropdown">
        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
          Users
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{route('user.index')}}">list user</a></li>
        </ul>
    </div>
</li>

