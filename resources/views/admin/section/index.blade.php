@extends('layouts.master')

@section('title')
    Home
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSection">
                    Add section
                </button>
                <div class="row m-4">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Proccess</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sections as $section)
                                <tr>
                                    <td>{{ $section->name }}</td>
                                    <td>{{ $section->description }}</td>
                                    <td>
                                        <a href="" title="edit section" data-bs-toggle="modal"
                                            data-bs-target="#editSection{{$section->id}}">
                                            <i class="fas fa-edit"></i></a>
                                        <a href="" title="delete secton" data-bs-toggle="modal"
                                            data-bs-target="#deleteSection{{$section->id}}">
                                            <i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @include('admin.section.edit')
                                @include('admin.section.delete')
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @include('admin.section.create')
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')

@endsection
@section('js')

@endsection
