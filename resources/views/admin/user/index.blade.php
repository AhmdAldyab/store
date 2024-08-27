@extends('layouts.master')

@section('title')
    list user
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
                <a href="{{ route('user.create') }}" class="btn btn-primary">
                    Add User
                </a>
                <div class="row m-4">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Address</th>
                            <th>number phone</th>
                            <th>Proccess</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->number_phone }}</td>
                                    <td>
                                        <a href="{{ route('user.edit',$user->id) }}" title="edit user" >
                                            <i class="fas fa-edit"></i></a>
                                        <a href="" title="delete user" data-bs-toggle="modal"
                                            data-bs-target="#deleteuser{{$user->id}}">
                                            <i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @include('admin.user.delete')
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
