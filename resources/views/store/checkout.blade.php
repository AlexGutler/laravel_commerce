@extends('store.store')

@section('title')
    Checkout | CodeCommerce
@endsection

@section('content')
    <section id="checkout">
        <div class="container">
            <div class="col-md-4">
                @if($cart == 'empty')
                    <div class="bs-callout bs-callout-danger">
                        <h4>Carrinho de compras vázio!</h4>
                    </div>
                @else
                    <div class="bs-callout bs-callout-success">
                        <h4>Seu pedido foi gerado com sucesso!</h4>
                        <h5>Número do pedido: {{$order->id}}</h5>
                        <p>Cliente: {{$order->user->name}}</p>
                        <p>Total: R$ {{number_format($order->total, 2)}} </p>
                        <p><a href="{{url('/')}}" class="btn change-cart btn-success" >Home</a></p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection