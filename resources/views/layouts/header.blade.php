<div class="header">
    <div class="d-flex justify-content-between p-2">
        <h1>New Store</h1>
        <div class="btn-group">
            <a type="button" class="btn btn-primary m-2" href="#"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            login out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-sm navbar-dark">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
            @if (auth()->user()->role == 'admin')
                @include('layouts.header.admin')
            @endif
            @if (auth()->user()->role == 'accountant')
                @include('layouts.header.accountant')
            @endif
            @if (auth()->user()->role == 'customer')
                @include('layouts.header.customer')
            @endif
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="text" placeholder="Search">
          <button class="btn btn-primary" type="button">Search</button>
        </form>
      </div>
    </div>
  </nav>
