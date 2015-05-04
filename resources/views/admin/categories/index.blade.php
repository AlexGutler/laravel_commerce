@extends('app')

@section('title')
    <title>CodeCommerce - Categories</title>
@endsection

@section('content')
    <section class="container">
        <h1>Categories</h1>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection