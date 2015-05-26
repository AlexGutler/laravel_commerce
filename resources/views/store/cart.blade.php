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
                                    <a href="#">
                                        Image
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
                                    <div class="change-cart btn"><i class="fa fa-minus"></i></div>
                                        <input type="text" name="qtd" value="{{$item['qtd']}}" disabled style="width: 30px;">
                                    <div class="change-cart btn"><i class="fa fa-plus"></i></div>
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
                        @endforelse

                        <tr class="cart_menu">

                            <td colspan="6">
                                <div class="pull-right">
                                    <span style="margin-right: 35px">Total: R$ {{number_format($cart->getTotal(), 2)}}</span>
                                    <div class="btn change-cart btn-success">Comprar</div>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </section>
@endsection