@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Featured Products</h2>
            @include('store.partial.products', ['products' => $prodFeatured])
        </div><!--features_items-->

        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recommended Products</h2>
            @include('store.partial.products', ['products' => $prodRecommended])
        </div><!--recommended-->

    </div>
@endsection