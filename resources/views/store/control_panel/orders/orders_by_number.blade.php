@extends('store.control_panel.template')

@section('left_sidebar')
    @include('store.control_panel.partial.left_sidebar')
@endsection

@section('info')
    <div class="col-sm-9 padding-right">
        <div class="content-right">
            <h2 class="panel-name">{{$panelName}}</h2>

            <form class="form-inline numero-form" role="form" method="post" action="{{route('panel.post_by_number')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="numero">Número do pedido:</label>
                    <input type="text" value="{{isset($numero) ? $numero : null}}" class="form-control" id="numero" style="width: 100px;" name="numero">
                </div>
                <button type="submit" class="btn btn-info">Buscar</button>
            </form>

            @if(count($orders))
                <div class="orders">
                    <table class="table table-hover orders-table">
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="col-md-2 mr">
                                        <strong class="order-id">{{str_pad($order->id, 8, "0", STR_PAD_LEFT) }}</strong>
                                        <p class="order-date">Data: {{ date_format($order->created_at, 'd/m/Y')}}</p>
                                    </td>
                                    <td class="col-md-2">1 item</td>
                                    <td class="col-md-2 p-strong">R$ {{number_format($order->total, 2, ',', '.')}}</td>
                                    <td class="col-md-3 p-strong text-center td-status">
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
                                    <td class="col-md-3 text-right">
                                        <a class="btn-panel"
                                           href="{{route('panel.order_detail', ['id' => $order->id])}}" role="button">
                                            Detalhes do pedido <i class="fa fa-plus"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @elseif(isset($numero))
                <h4>Não foi encontrado nenhum pedido com o número solicitado.</h4>
            @endif
        </div>
    </div>
@endsection

