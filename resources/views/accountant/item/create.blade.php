@extends('layouts.master')

@section('title')
    Add item
@endsection

@section('css')

@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex">
                <h4 class="left">Add item</h4>
                <h1 class="m-2 text-center flex-fill" >Welcom {{ auth()->user()->name }}</h1>
            </div>
            <div class="card-body">
                <div class="row m-4">
                    <form action="{{ route('item.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3 mt-3">
                            <div class="col-6">
                                <input type="text" name="name" id="name" required
                                placeholder="Enter name :" class="form-control">
                            </div>
                            <div class="col-6">
                                <input type="number" name="number_code" id="number_code" required
                                placeholder="Enter number code :" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="section" required>
                                <option>select section</option>
                                @foreach ($sections as $section)
                                    <option value="{{$section->id}}">{{$section->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <input type="date" name="date" id="date" required
                                placeholder="Enter expiration date :" class="form-control">
                            </div>
                            <div class="col-4">
                                <input type="number" name="site" id="site" required
                                placeholder="Enter site :" class="form-control">
                            </div>
                            <div class="col-4">
                                <input type="price_pay" name="price_pay" id="price_pay" required
                                placeholder="Enter the price of pay :" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <input type="number" name="quantity" id="quantity" required
                                placeholder="Enter quantity :" class="form-control">
                            </div>
                            <div class="col-4">
                                <input type="text" name="unit" id="unit" required
                                placeholder="Enter unit :" class="form-control">
                            </div>
                            <div class="col-4">
                                <input type="text" name="supplier" id="supplier" required
                                placeholder="Enter supplier :" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="New" id="New">
                                <label class="form-check-label" for="New">
                                  New order
                                </label>
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
