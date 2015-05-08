@extends('app')

@section('title')
    <title>CodeCommerce - Admin - Categories</title>
@endsection

@section('content')

    <div class="container">
        <h1>Categories</h1>

        <p><a class="btn btn-primary" href="{{route('admin.categories.create')}}"> + Category</a> </p>

        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $cateogry)
                <tr>
                    <td>{{$cateogry->id}}</td>
                    <td>{{$cateogry->name}}</td>
                    <td>{{$cateogry->description}}</td>
                    <td>
                        <a href="{{route('admin.categories.edit', ['id' => $cateogry->id])}}" class="btn btn-success">Edit</a>
                        <a href="{{route('admin.categories.destroy', ['id' => $cateogry->id])}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $categories->render() !!}
    </div>
@endsection
