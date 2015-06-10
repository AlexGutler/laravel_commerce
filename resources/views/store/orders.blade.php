@extends('store.store')

@section('title')
    My Account | CodeCommerce
@endsection

@section('content')
    <section id="checkout">
        <div class="container">
            <h2>Meus Pedidos</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Pedido</th>
                        <th>Data</th>
                        <th>Itens</th>
                        <th>Valor</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{ date_format($order->created_at, "d/m/Y")}}</td>
                            <td>
                                <ul>
                                    @foreach($order->items as $item)
                                        <li>{{$item->product->name}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>R$ {{number_format($order->total, 2)}}</td>
                            <td>
                                @if($order->status == 0)
                                    Pedido Realizado
                                @elseif($order->status == 1)
                                    Autorização de Pagamento
                                @elseif($order->status == 2)
                                    Nota fiscal eletrônica/Separação em estoque
                                @elseif($order->status == 3)
                                    Produto(s) em transporte
                                @elseif($order->status == 4)
                                    Produto(s) entregue(s)
                                @elseif($order->status == 5)
                                    Pedido Cancelado
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection