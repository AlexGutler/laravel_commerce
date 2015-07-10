@extends('store.control_panel.template')

@section('left_sidebar')
    @include('store.control_panel.partial.left_sidebar')
@endsection

@section('info')
    <div class="col-sm-9 padding-right">
        <div class="content-right">
            <h2 class="title-order">Detalhes do pedido #{{str_pad($order->id, 8, "0", STR_PAD_LEFT) }}</h2>

            <div class="orders">
                
                <div class="detail-head">
                    <div class="row">
                        <div class="col-md-3 order-data">
                            <p><strong>Número do pedido</strong></p>
                            <h3 class="detail-order-id">#{{str_pad($order->id, 8, "0", STR_PAD_LEFT) }}</h3>
                            <p class="">Data: {{ date_format($order->created_at, 'd/m/Y')}}</p>
                            <p class="order-checking-copy"><a href="">Imprimir comprovante</a></p>
                        </div>
                        <div class="col-md-4 order-status">
                            <p><strong>Situação</strong></p>
                            <span>Enviado para a transportadora</span>
                            <p><strong>Forma de pagamento</strong></p>
                            R$ 94,90 - Saraiva - 2x sem juros - 5% de Desc (ECOMMERCE H)
                        </div>
                        <div class="col-md-3 order-address">
                            <p><strong>Endereço</strong></p>
                            <div class="endTitle">
                                <div class="endEntregaCobranca">Entrega e cobrança</div>
                                <div class="setaEndCob"></div>
                            </div>
                            Rua José de Anchieta Fontana - 00252
                            Alvorada - Santa Teresa - ES
                            Brasil - 29650000
                        </div>
                        <div class="col-md-2 back-to-orders">
                            <i class="fa fa-chevron-left"></i> <a href="">Retornar aos <br>meus pedidos</a>
                        </div>
                    </div>
                </div>
                <h4 class="itens-pedido">Itens do pedido</h4>
                <table class="table orders-table">
                    <tbody class="text-center">
                    @foreach($order->items as $item)
                        <tr>
                            <td class="col-md-1 mr">
                                @if(count($item->product->images))
                                    <img src="{{ url('uploads/images/products/'.$item->product->id.'/'.$item->product->images->first()->id.'.'.$item->product->images->first()->extension) }}" alt="" width="80" />
                                @else
                                    <img src="{{ url('images/no-img.jpg') }}" alt="" width="80" />
                                @endif
                            </td>
                            <td class="col-md-2">
                                <strong class="order-id">{{$item->product->name}}</strong>
                            </td>
                            <td class="col-md-2 text-center">Quantidade: <strong> 1 </strong></td>
                            <td class="col-md-2 p-strong">R$ {{number_format($item->product->price, 2, ',', '.')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

