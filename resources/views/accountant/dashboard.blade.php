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
                <div class="col-6">
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
                <div class="col-6">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Order</h5>
                          <p class="card-text">count order for you {{ App\Models\order::select(DB::raw('count(*) as count'))->where('user_id',auth()->user()->id)->first()->count }}</p>
                          <p class="card-text">count order for you {{ App\Models\order::select(DB::raw('count(*) as count'))->first()->count }}</p>
                          <a href="{{ route('order.add') }}" class="btn btn-primary">Add order</a>
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
