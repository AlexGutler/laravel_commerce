@extends('store.store')

@section('title')
    {{$product->name}} | CodeCommerce
@endsection

@section('categories')
    @include('store.partial.categories')
@endsection

@section('content')

    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">

                    @if(count($product->images))
                        <img src="{{ url('uploads/images/products/'.$product->id.'/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" alt="" />
                    @else
                        <img src="{{ url('images/no-img.jpg') }}" alt="" />
                    @endif


                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            @foreach($product->images as $image)
                                <a href="#"><img src="{{url('uploads/images/products/'.$product->id.'/'.$image->id.'.'.$image->extension)}}" width="80" alt=""/></a>
                            @endforeach
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->

                    <h2>{{$product->category->name}} :: {{$product->name}}</h2>

                    <p>{{$product->description}}</p>

                    <span>
                        <span>R$ {{number_format($product->price,2,',','.')}}</span>
                        {{--<a href="{{route('cart.add',['id'=>$product->id])}}" class="btn btn-default cart">--}}
                        <a href="#" class="btn btn-default cart">
                            <i class="fa fa-shopping-cart"></i>
                            Add to Cart
                        </a>
                    </span>

                    <p>
                        @if(count($product->tags))
                            Tags:
                            @foreach($product->tags as $tag)
                                <a href="{{ route('store.tag', ['id' => $tag->id]) }}" class="btn btn-default">{{$tag->name}}</a>
                            @endforeach
                        @endif
                    </p>

                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->
    </div>
@endsection