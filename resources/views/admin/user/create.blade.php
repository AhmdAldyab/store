@extends('layouts.master')

@section('title')
    Add user
@endsection

@section('css')

@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex">
                <h4 class="left">Add user</h4>
                <h1 class="m-2 text-center flex-fill" >Welcom {{ auth()->user()->name }}</h1>
            </div>
            <div class="card-body">
                <div class="row m-4">
                    <form action="{{ route('user.save') }}" method="POST">
                        @csrf
                        <div class="row mb-3 mt-3">
                            <div class="col-4">
                                <input type="text" name="name" id="name" required
                                placeholder="Enter name :" class="form-control">
                            </div>
                            <div class="col-4">
                                <input type="text" name="lastname" id="lastname" required
                                placeholder="Enter last name :" class="form-control">
                            </div>
                            <div class="col-4">
                                <input type="email" name="email" id="email" required
                                placeholder="Enter email :" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="role" required>
                                <option value="customer">customer</option>
                                <option value="admin">admin</option>
                                <option value="accountant">accountant</option>
                                <option value="watcher">watcher</option>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <input type="password" name="password" id="password" required
                                placeholder="Enter password :" class="form-control">
                            </div>
                            <div class="col-4">
                                <input type="text" name="address" id="address" required
                                placeholder="Enter address :" class="form-control">
                            </div>
                            <div class="col-4">
                                <input type="number" name="number_phone" id="number_phone" required
                                placeholder="Enter number phone :" class="form-control">
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
