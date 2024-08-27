@extends('layouts.master')

@section('title')
    Item
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
                            <th>Section</th>
                            <th>Price sell</th>
                            <th>Price pay</th>
                            <th>Quantity</th>
                            <th>Proccess</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->section->name }}</td>
                                    <td>{{ $item->price_sell }}</td>
                                    <td>{{ $item->price_pay }}</td>
                                    <td>{{ $item->quantity }} {{ $item->unit }}</td>
                                    <td>
                                        <a href="{{ route('item.edit',$item->id) }}" title="edit item">
                                            <i class="fas fa-edit"></i></a>
                                        <a href="#" title="delete item" data-bs-toggle="modal"
                                            data-bs-target="#deleteItem{{$item->id}}">
                                            <i class="fas fa-trash"></i></a>
                                        <a href="#" title="update price" data-bs-toggle="modal"
                                            data-bs-target="#addprice{{$item->id}}">
                                            <i class="fas fa-add"></i></a>
                                    </td>
                                    @include('admin.item.delete')
                                    @include('admin.item.addPrice')
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
