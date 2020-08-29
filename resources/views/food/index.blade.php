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

                <div class="card-header">All Food
                    <span class="float-right">
                    <a href="{{ route('food.create') }}">
                        <button type="button" class="btn btn-info">Add Food</button>
                    </a>
                    </span>
                </div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($foods)>0)
                        @foreach($foods as $key => $food)
                        <tr>
                            <th scope="row">{{ $key + $foods->firstItem() }}</th>
                            <td><img src="{{ asset ('food-images') }}/{{ $food->image}}" width="100" alt=""></td>
                            <td>{{ $food->name }}</td>
                            <td>{{ $food->description }}</td>
                            <td>${{ $food->price }}</td>
                            @if(empty($food->category->name))
                                <td>No Category</td>
                            @else
                                <td>{{ $food->category->name}}</td>
                            @endif
                            <td>
                                <a href="{{ route('food.edit',[$food->id] )}}">
                                    <button class="btn btn-success">Edit</button>
                                </a>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" {{$food->id}} >
                                    Delete
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('food.destroy',[$food->id] )}}" method="POST">@csrf {{method_field('DELETE')}}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel" {{$food->id}}>Confirm Delete</h5>
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
                        <td>No Food to Display</td>
                        @endif
                    </tbody>
                </table>
                {{$foods->links()}}
            </div>
        </div>
    </div>
    @endsection