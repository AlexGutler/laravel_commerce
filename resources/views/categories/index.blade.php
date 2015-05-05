@extends('app')

@section('content')

    <div class="container">
        <h1>Categories</h1>

        <table class="table">
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
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
