@extends('store.store')

@section('title')
    Cart | CodeCommerce
@endsection

@section('content')
    <section id="cart_items">
        <div class="container">

            <div class="table-responsive cart_info">

                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Valor</td>
                            <td class="qtd">Quantidade</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cart->all() as $k => $item)
                            <tr>
                                <td class="cart_product">
                                    <a href="{{route('store.product',['id' => $k])}}">
                                        {{-- a linha abaixo define uma instancia de product referente a busca pelo id $k --}}
                                        {{--*/ $p = $product->find($k) /*--}}
                                        @if(count($p->images))
                                            <img src="{{url('uploads/images/products/'.$k.'/'.$p->images->first()->id.'.'.$p->images->first()->extension)}}" width="80" alt=""/>
                                        @else
                                            <img src="{{ url('images/no-img.jpg') }}" width="80" alt="" />
                                        @endif
                                    </a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="{{route('store.product',['id' => $k])}}">{{$item['name']}}</a></h4>
                                    <p>Cód: {{$k}}</p>
                                </td>
                                <td class="cart_price">
                                    R$ {{ number_format($item['price'], 2) }}
                                </td>
                                <td class="cart_quantity">
                                    <a href="{{route('cart.remove',['id' => $k])}}" class="btn btn-down-qtd"><i class="fa fa-minus"></i></a>
                                    {{--<button class="btn btn-down-qtd"><i class="fa fa-minus"></i></button>--}}
                                        <input type="text" name="qtd" value="{{$item['qtd']}}" disabled style="width: 30px; text-align: center; ">
                                        {{--<input type="hidden" name="id" value="{{$k}}" class="id_product"/>--}}
                                    <a href="{{route('cart.add',['id' => $k])}}" class="btn btn-up-qtd"><i class="fa fa-plus"></i></a>
                                    {{--<button class="btn btn-up-qtd"><i class="fa fa-plus"></i></button>--}}
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">R$ {{number_format($item['price'] * $item['qtd'], 2)}}</p>
                                </td>
                                <td class="cart_del">
                                    <a href="{{route('cart.destroy',['id' => $k])}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="cart_product" colspan="6">
                                    <p>Carrinho vazio...</p>
                                </td>
                            </tr>
                            <tr class="cart_menu">
                                <td colspan="6">
                                    <div class="pull-right">
                                        <a href="{{url('/')}}" class="btn change-cart btn-warning" >Continuar a comprar</a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        @if(count($cart->all()))
                            <tr class="cart_menu">
                                <td colspan="6">
                                    <div class="pull-right">
                                        <span style="margin-right: 35px">Total: R$ {{number_format($cart->getTotal(), 2)}}</span>
                                        <a href="{{route('checkout.place')}}" class="btn change-cart btn-success" >Comprar</a>
                                    </div>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>

            </div>

        </div>
    </section>
@endsection