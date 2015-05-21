@extends('store.store')

@section('title')
    {{$category->name}} | CodeCommerce
@endsection

@section('categories')
    @include('store.partial.categories')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">

        <div class="category_items"><!--category_items-->
            <h2 class="title text-center">{{strtoupper($category->name)}}</h2>
            @include('store.partial.products', ['products' => $products])
        </div><!--category_items-->

    </div>
@endsection