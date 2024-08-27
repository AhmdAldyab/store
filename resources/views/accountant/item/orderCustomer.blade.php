@extends('layouts.master')

@section('title')
    Orders
@endsection

@section('css')

@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h1 class="m-2 text-center">Welcom {{ auth()->user()->name }}</h1>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                               <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row m-4">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Number of orders</th>
                                <th>Price</th>
                                <th>Proccess</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                       {{App\Models\User::findOrFail($order->user_id)->name}}
                                    </td>
                                    <td>{{ $order->number_of_orders }}</td>
                                    <td>{{ $order->Amount }}</td>
                                    <td>
                                        <a href="{{ route('orderOneCustomer.show',$order->user_id) }}" title="show order"
                                        <i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')

@endsection
@section('js')

@endsection
