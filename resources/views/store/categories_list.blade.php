@extends('store.store')

@section('title')
    {{$category->name}} | CodeCommerce
@endsection

@section('categories')
    @include('store.categories_partial')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">

        <div class="category_items"><!--category_items-->
            <h2 class="title text-center">{{strtoupper($category->name)}}</h2>

            @foreach($products as $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                @if(count($product->images))
                                    <img src="{{url('uploads/images/products/'.$product->id.'/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" alt="" />
                                @else
                                    <img src="{{url('images/no-img.jpg')}}" alt="" />
                                @endif
                                <h2>R$ {{number_format($product->price, 2)}}</h2>
                                <p><strong>{{$product->name}}</strong></p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R$ {{number_format($product->price, 2)}}</h2>
                                    <p><strong>{{$product->name}}</strong></p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div><!--category_items-->

    </div>
@endsection