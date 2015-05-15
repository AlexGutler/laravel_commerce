@extends('app')

@section('title')
    <title>CodeCommerce - Admin - Editing Product</title>
@endsection

@section('content')
    <div class="container">
        <h1>Editing Product: {{$product->name}}</h1>
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
        {!! Form::open( ['route' => ['admin.products.update', $product->id, 'method' => 'put'] ] ) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::number('price', $product->price, ['class' => 'form-control ']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tags', 'Tags:') !!}
                {!! Form::textarea('tags', $product->tag_list, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category', 'Category:') !!}
                {!! Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control ']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('featured', 'Featured:')  !!}
                <div class="form-control">
                    {!! Form::radio('featured', false, $product->featured ? false : true); !!} No
                    {!! Form::radio('featured', true, $product->featured ? true : false); !!} Yes
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('recommend', 'Recommend:') !!}
                <div class="form-control">
                    {!! Form::radio('recommend', false, $product->recommend ? false : true); !!} No
                    {!! Form::radio('recommend', true, $product->recommend ? true : false); !!} Yes
                </div>
            </div>
            <div class="form-group">
                {!! Form::hidden('_method', 'put') !!}
                {!! Form::submit('Update Product', ['class' => 'btn btn-primary']) !!}
                <a href="{{route('admin.products.index')}}" class="btn btn-default">Cancel</a>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
