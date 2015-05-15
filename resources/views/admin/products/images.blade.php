@extends('app')

@section('title')
    <title>CodeCommerce - Admin - Products</title>
@endsection

@section('content')
    <div class="container">
        <h1>Images of {{$product->name}}</h1>
        <p><a class="btn btn-primary" href="{{route('admin.products.images.create',['id' => $product->id])}}"> + Image</a> </p>
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Extension</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product->images as $image)
                <tr>
                    <td>{{$image->id}}</td>
                    <td>
                        <img src="{{url('uploads/images/products/'.$product->id.'/'.$image->id.'.'.$image->extension)}}" width="80">
                    </td>
                    <td>{{$image->extension}}</td>
                    <td>
                        <a href="{{route('admin.products.images.destroy', ['id' => $image->id])}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('admin.products.index')}}" class="btn btn-default">Return</a>
        {{--{!! $product->images->render() !!}--}}
    </div>
@endsection
