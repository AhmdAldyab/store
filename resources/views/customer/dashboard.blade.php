@extends('layouts.master')

@section('title')
    list order
@endsection

@section('css')

@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h1 class="m-2 text-center">list orders</h1>
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
                <a href="{{ route('orderCustomer.add') }}" class="btn btn-primary">Add order</a>
                <div class="row m-4">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>Section</th>
                            <th>Price sell</th>
                            <th>Quantity</th>
                            <th>States</th>
                            <th>Proccess</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->item->name }}</td>
                                        <td>{{ $order->item->section->name }}</td>
                                        <td>{{ $order->item->price_sell }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>Not ready</td>
                                        <td>
                                            <a href="#" title="edit order" data-bs-toggle="modal"
                                              data-bs-target="#editorder{{$order->id}}">
                                              <i class="fas fa-edit"></i></a>
                                            <a href="#" title="delete order" data-bs-toggle="modal"
                                              data-bs-target="#deleteorder{{$order->id}}">
                                              <i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @include('customer.item.edit')
                                    @include('customer.item.delete')
                                @endforeach
                                @foreach ($sells as $sell)
                                    <tr>
                                        <td>{{ $sell->item->name }}</td>
                                        <td>{{ $sell->item->section->name }}</td>
                                        <td>{{ $sell->item->price_sell }}</td>
                                        <td>{{ $sell->amount }}</td>
                                        <td>ready</td>
                                        <td>
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
