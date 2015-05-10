@extends('app')

@section('title')
    <title>CodeCommerce - Admin - Create Product</title>
@endsection

@section('content')
    <div class="container">
        <h1>Upload Image</h1>
        @if ($errors->any())
            <ul class="alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        {{--
            * http://laravel.com/docs/4.2/html
            * http://laravelcollective.com/ * http://laravelcollective.com/docs/5.0/html
        --}}
        {!! Form::open(['route' => ['admin.products.images.store', 'id' => $product->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('image', 'Image:') !!}
                {!! Form::file('image', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Upload Image', ['class' => 'btn btn-primary']) !!}
                <a href="{{route('admin.products.images',['id' => $product->id])}}" class="btn btn-default">Return</a>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
