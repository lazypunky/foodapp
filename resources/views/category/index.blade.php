@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{Session::get('message')}}
            </div>
            @endif
            <div class="card">

                <div class="card-header">All Category
                    <span class="float-right">
                    <a href="{{ route('category.create') }}">
                        <button type="button" class="btn btn-info">Add Category</button>
                    </a>
                    </span>
                </div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($categories)>0)
                        @foreach($categories as $key => $category)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('category.edit',[$category->id] )}}">
                                    <button class="btn btn-success">Edit</button>
                                </a>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" {{$category->id}} >
                                    Delete
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('category.destroy',[$category->id] )}}" method="POST">@csrf {{method_field('DELETE')}}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel" {{$category->id}}>Confirm Delete</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are You Sure?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <td>No Category to Display</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection