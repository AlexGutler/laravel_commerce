@extends('app')

@section('title')
    <title>CodeCommerce - Admin - Products</title>
@endsection

@section('products-active')active @endsection

@section('content')
    <div class="container">
        <h1>Products</h1>
        <p><a class="btn btn-primary" href="{{route('admin.products.create')}}"> + Product</a> </p>
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Featured </th>
                <th>Recommend</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->category_id}} - {{$product->category->name}}</td>
                    <td>{{$product->featured ? 'Yes' : 'No'}}</td>
                    <td>{{$product->recommend ? 'Yes' : 'No'}}</td>
                    <td>
                        <a href="{{route('admin.products.images', ['id' => $product->id])}}" class="btn btn-default">Images</a>
                        <a href="{{route('admin.products.edit', ['id' => $product->id])}}" class="btn btn-warning">Edit</a>
                        <a href="{{route('admin.products.destroy', ['id' => $product->id])}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $products->render() !!}
    </div>
@endsection
