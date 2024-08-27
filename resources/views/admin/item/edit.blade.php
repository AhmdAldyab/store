@extends('layouts.master')

@section('title')
    Edit item
@endsection

@section('css')

@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex">
                <h4 class="left">Edit item</h4>
                <h1 class="m-2 text-center flex-fill" >Welcom {{ auth()->user()->name }}</h1>
            </div>
            <div class="card-body">
                <div class="row m-4">
                    <form action="{{ route('item.update','test') }}" method="POST">
                        @csrf
                        <div class="row mb-3 mt-3">
                            <div class="col-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <input type="text" value="{{ $item->name }}" name="name" id="name" required
                                placeholder="Enter name :" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="number_code" class="form-label">Number code</label>
                                <input type="number" name="number_code" value="{{ $item->number_code }}" id="number_code" required
                                placeholder="Enter number code :" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="section" class="form-label">Section</label>
                            <select class="form-select" name="section" required>
                                <option value="{{ $item->section->id }}">{{ $item->section->name }}</option>
                                @foreach ($sections as $section)
                                    <option value="{{$section->id}}">{{$section->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="price_pay" class="form-label">Price pay</label>
                                <input type="number" name="price_pay" id="price_pay" value="{{ $item->price_pay }}" required
                                placeholder="Enter the price of pay :" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="price_sell" class="form-label">Price sell</label>
                                <input type="number" name="price_sell" id="price_sell" value="{{ $item->price_sell }}" required
                                placeholder="Enter price sell :" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" name="quantity" id="quantity" value="{{ $item->quantity }}" required
                                placeholder="Enter quantity :" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="unit" class="form-label">Unit</label>
                                <input type="text" name="unit" id="unit" value="{{ $item->unit }}" required
                                placeholder="Enter unit :" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="site" class="form-label">Site</label>
                                <input type="number" name="site" id="site" value="{{ $item->number_place }}" required
                                placeholder="Enter site :" class="form-control">
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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
