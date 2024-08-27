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
                <form action="{{route('order.show')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="submit" class="btn btn-primary" value="Save order">
                        </div>
                        <div class="col">
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <input type="hidden" name="name" id="name" required
                            value="{{$user->id}}" class="form-control">
                        </div>
                    </div>
                </form>
                <div class="row m-4">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>Section</th>
                            <th>Price sell</th>
                            <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->item->name }}</td>
                                        <td>{{ $order->item->section->name }}</td>
                                        <td>{{ $order->item->price_sell }}</td>
                                        <td>{{ $order->quantity }}</td>
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
