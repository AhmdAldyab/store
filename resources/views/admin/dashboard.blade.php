@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card m-5">
            <h1 class="m-2 text-center">Welcom {{ auth()->user()->name }}</h1>
            <din class="row m-5">
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">User</h5>
                          <p class="card-text">count admin {{ App\Models\User::select(DB::raw('count(*) as count'))->where('role','admin')->first()->count }}</p>
                          <p class="card-text">count customer {{ App\Models\User::select(DB::raw('count(*) as count'))->where('role','customer')->first()->count }}</p>
                          <p class="card-text">count accountant {{ App\Models\User::select(DB::raw('count(*) as count'))->where('role','accountant')->first()->count }}</p>
                          <p class="card-text">count watcher {{ App\Models\User::select(DB::raw('count(*) as count'))->where('role','watcher')->first()->count }}</p>
                          <a href="{{ route('user.index') }}" class="btn btn-primary">Show users</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Item</h5>
                          <p class="card-text">number of item {{ App\Models\item::select(DB::raw('count(*) as count'))->first()->count }}</p>
                          <p class="card-text">number of piece {{ App\Models\item::select(DB::raw('SUM(quantity) as count'))->first()->count }}</p>
                          <p class="card-text">items for price {{ App\Models\item::select(DB::raw('count(*) as count'))->whereNULL('price_sell')->first()->count }}</p>
                          <a href="{{ route('item.index') }}" class="btn btn-primary">Show items</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Section</h5>
                          <p class="card-text">count section {{ App\Models\section::select(DB::raw('count(*) as count'))->first()->count }}</p>
                          <a href="{{ route('section.index') }}" class="btn btn-primary">Show sections</a>
                        </div>
                    </div>
                </div>
            </din>
        </div>
    </div>
</div>

@endsection

@section('footer')

@endsection
@section('js')

@endsection
