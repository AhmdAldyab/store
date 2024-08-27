@extends('layouts.master')

@section('title')
    Add order
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
                @if ($message != "")
                <div class="alert alert-danger">{{ $message }}</div>
                @endif
                <a href="{{ route('orderCustomer.send',auth()->user()->id) }}" class="btn btn-primary">Save order</a>
                <div class="row m-4">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>Section</th>
                            <th>Price sell</th>
                            <th>Quantity</th>
                            <th>Proccess</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <form action="{{ route('orderCustomer.store')}}" method="POST">
                                            @csrf
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->section->name }}</td>
                                            <td>{{ $item->price_sell }}</td>
                                            <td>
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <input type="number" name="quantity" class="form-control">
                                            </td>
                                            <td>
                                                <button class="btn btn-light" type="submit" title="add order" >
                                                <i class="fas fa-add"></i></button>
                                            </td>
                                        </form>
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
