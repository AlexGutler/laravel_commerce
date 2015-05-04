@extends('app')

@section('title')
    <title>CodeCommerce - Products</title>
@endsection

@section('content')
    <section class="container">
        <h1>Products</h1>
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th>{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection