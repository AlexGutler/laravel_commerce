@extends('app')

@section('title')
    <title>CodeCommerce - Admin - Orders</title>
@endsection

@section('orders-active')active @endsection

@section('content')
    <div class="container">
        <h1>Orders</h1>
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Items</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user->name}}</td>
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
                    <td>
                        <a href="{{route('admin.orders.edit', ['id' => $order->id])}}" class="btn btn-warning">Edit</a>
                        {{--<a href="{{route('admin.products.cancel', ['id' => $order->id])}}" class="btn btn-danger">Cancel</a>--}}
                        {{--<a href="#" class="btn btn-warning">Edit</a>--}}
                        {{--<a href="#" class="btn btn-danger">Cancel</a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $orders->render() !!}
    </div>
@endsection
