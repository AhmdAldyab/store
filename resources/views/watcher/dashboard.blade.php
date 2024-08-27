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
                                <th>Place of item</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Proccess</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->section->name }}</td>
                                    <td>{{ $item->number_place }}</td>
                                    <td>{{ $item->quantity }} {{ $item->unit }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="#" title="change place" data-bs-toggle="modal"
                                        data-bs-target="#changeplace{{$item->id}}">
                                        <i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                @include('watcher.item.place')
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
