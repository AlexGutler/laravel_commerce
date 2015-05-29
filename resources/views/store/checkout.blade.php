@extends('store.store')

@section('title')
    Checkout | CodeCommerce
@endsection

@section('content')
    <section id="checkout">
        <div class="container">
            <div class="col-md-4">
                <div class="bs-callout bs-callout-success">
                    <h4>Pedido Gerado com Sucesso!</h4>
                    <p>Cliente: {{$order->user->name}}</p>
                    <p>Total: R$ {{number_format($order->total, 2)}} </p>
                    <p><a href="{{url('/')}}" class="btn change-cart btn-success" >Continuar a comprar</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection