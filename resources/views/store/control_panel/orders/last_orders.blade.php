@extends('store.control_panel.template')

@section('left_sidebar')
    @include('store.control_panel.partial.left_sidebar')
@endsection

@section('info')
    <div class="col-sm-9 padding-right">
        <div class="content-right">
            <h2>Últimos Pedidos</h2>

            <table class="my-table">
                <tbody>
                    {{--<tr>--}}
                        {{--<th>Pedido</th>--}}
                        {{--<th>Data</th>--}}
                        {{--<th>Itens</th>--}}
                        {{--<th>Valor</th>--}}
                        {{--<th>Status (+detalhes)</th>--}}
                    {{--</tr>--}}
                    <tr>
                        <td class="stgTitle" colspan="3">Pedido <br>Realizado</td>
                        <td class="stgTitle" colspan="3">Autorização do <br>Pagamento</td>
                        <td class="stgTitle" colspan="3">Nota fiscal <br>eletrônica</td>
                        <td class="stgTitle" colspan="3">Produto(s) em <br>transporte</td>
                        <td class="stgTitle" colspan="3">Produto(s) <br>entregues(s)</td>
                    </tr>

                    {{--@foreach($orders as $order)--}}
                        {{--<tr>--}}
                            {{--<td>--}}
                                {{--{{$order->id}}--}}
                                {{--<div class="trow"></div>--}}
                            {{--</td>--}}
                            {{--<td>{{ date_format($order->created_at, "d/m/Y")}}</td>--}}
                            {{--<td>--}}
                                {{--<ul>--}}
                                    {{--@foreach($order->items as $item)--}}
                                        {{--<li>{{$item->product->name}}</li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}
                            {{--</td>--}}
                            {{--<td>R$ {{number_format($order->total, 2)}}</td>--}}
                            {{--<td>--}}
                                {{--@if($order->status == 0)--}}
                                    {{--Pedido Realizado--}}
                                {{--@elseif($order->status == 1)--}}
                                    {{--Autorização de Pagamento--}}
                                {{--@elseif($order->status == 2)--}}
                                    {{--Nota fiscal eletrônica/Separação em estoque--}}
                                {{--@elseif($order->status == 3)--}}
                                    {{--Produto(s) em transporte--}}
                                {{--@elseif($order->status == 4)--}}
                                    {{--Produto(s) entregue(s)--}}
                                {{--@elseif($order->status == 5)--}}
                                    {{--Pedido Cancelado--}}
                                {{--@endif--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}

                    <tr>
                        <td id="tdLineFirst" class="stgTdLinePrev" style="width: 10.0%;"></td>
                        <td class="stgTdIcon">
                            <div class="bgLine firstStage bglineColorCompleted"></div>
                            <div id="stgIcon1" class="stgIcon order completed"></div>
                        </td>
                        <td class="stgTdLineBetween" colspan="2" style="width: 20.0%;">
                            <div class="bgLine bglineColorCompleted"></div>
                        </td>
                        <td class="stgTdIcon">
                            <div class="bgLine bglineColorCompleted"></div>
                            <div id="stgIcon2" class="stgIcon payment completed"></div>
                        </td>
                        <td class="stgTdLineBetween" colspan="2" style="width: 20.0%;">
                            <div class="bgLine bglineColorCompleted"></div>
                        </td>
                        <td class="stgTdIcon">
                            <div class="bgLine bglineColorCompleted"></div>
                            <div id="stgIcon2" class="stgIcon preparation completed"></div>
                        </td>
                        <td class="stgTdLineBetween" colspan="2" style="width: 20.0%;">
                            <div class="bgLine bgLineColorCompleted2Processing"></div>
                        </td>
                        <td class="stgTdIcon">
                            <div class="bgLine bglineColorProcessing"></div>
                            <div id="stgIcon2" class="stgIcon transport processing"></div>
                        </td>
                        <td class="stgTdLineBetween" colspan="2" style="width: 20.0%;">
                            <div class="bgLine bgLineColorProcessing2Waiting"></div>
                        </td>
                        <td class="stgTdIcon">
                            <div class="bgLine lastStage bglineColorWaiting"></div>
                            <div id="stgIcon5" class="stgIcon delivered waiting"></div>
                        </td>
                        <td id="tdLineLast" style="width: 10.0%;"></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection

