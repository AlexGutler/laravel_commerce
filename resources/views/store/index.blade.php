@extends('store.store')

@section('categories')
    @include('store.categories_partial')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Featured Products</h2>

            @foreach($prodFeatured as $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                @if(count($product->images))
                                    <img src="{{ url('uploads/images/products/'.$product->id.'/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" alt="" />
                                @else
                                    <img src="{{ url('images/no-img.jpg') }}" alt="" />
                                @endif
                                <h2>R$ {{ number_format($product->price, 2) }}</h2>
                                <p><strong>{{$product->name}}</strong></p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R$ {{ number_format($product->price, 2) }}</h2>
                                    <p><strong>{{$product->name}}</strong></p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div><!--features_items-->

        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recommended Products</h2>

            @foreach($prodRecommend as $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                @if(count($product->images))
                                    <img src="{{ url('uploads/images/products/'.$product->id.'/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" alt="" width="200"/>
                                @else
                                    <img src="{{ url('images/no-img.jpg') }}" alt="" width="200"/>
                                @endif
                                <h2>R$ {{ number_format($product->price, 2) }}</h2>
                                <p><strong>{{$product->name}}</strong></p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R$ {{ number_format($product->price, 2) }}</h2>
                                    <p><strong>{{$product->name}}</strong></p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div><!--recommended-->

    </div>
@endsection