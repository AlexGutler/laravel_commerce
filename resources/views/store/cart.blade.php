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
                        @foreach($cart->all() as $k => $item)
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
                                    {{$item['qtd']}}
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">R$ {{number_format($item['price'] * $item['qtd'], 2)}}</p>
                                </td>
                                <td class="cart_delete">
                                    <a href="{{route('cart.destroy',['id' => $k])}}" class="cart_quantity_delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </section>
@endsection