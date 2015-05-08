@extends('app')

@section('title')
    <title>CodeCommerce - Admin - Create Product</title>
@endsection

@section('content')
    <div class="container">
        <h1>Create Product</h1>
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
        {!! Form::open(['route' => 'admin.products.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::number('price', '', ['class' => 'form-control ']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category', 'Category:') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control ']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('featured', 'Featured:')  !!}
                <div class="form-control">
                    {!! Form::radio('featured', false, true); !!} No
                    {!! Form::radio('featured', true, false); !!} Yes
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('recommend', 'Recommend:') !!}
                <div class="form-control">
                    {!! Form::radio('recommend', false, true); !!} No
                    {!! Form::radio('recommend', true, false); !!} Yes
                </div>
            </div>

            <div class="form-group">
                {!! Form::submit('Add Product', ['class' => 'btn btn-primary']) !!}
                <a href="{{route('admin.products.index')}}" class="btn btn-default">Return</a>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
