@extends('layouts.master')

@section('title')
    Edit user
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
                    <form action="{{ route('user.update','test') }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="row mb-3 mt-3">
                            <div class="col-4">
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <input type="text" name="name" id="name" required
                                placeholder="Enter name :" value="{{ $user->name }}" class="form-control">
                            </div>
                            <div class="col-4">
                                <input type="text" name="lastname" id="lastname" required
                                placeholder="Enter last name :" value="{{ $user->last_name }}" class="form-control">
                            </div>
                            <div class="col-4">
                                <input type="email" name="email" id="email" required
                                placeholder="Enter email :" value="{{ $user->email }}" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="role" required>
                                <option value="{{$user->role}}">{{$user->role}}</option>
                                <option value="customer">customer</option>
                                <option value="admin">admin</option>
                                <option value="accountant">accountant</option>
                                <option value="watcher">watcher</option>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <input type="text" name="password" id="password" required
                                placeholder="Enter password :" value="{{ Hash::needsRehash($user->password) }}" class="form-control">
                            </div>
                            <div class="col-4">
                                <input type="text" name="address" id="address" required
                                placeholder="Enter address :" value="{{ $user->address }}" class="form-control">
                            </div>
                            <div class="col-4">
                                <input type="number" name="number_phone" id="number_phone" required
                                placeholder="Enter number phone :" value="{{ $user->number_phone }}" class="form-control">
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
