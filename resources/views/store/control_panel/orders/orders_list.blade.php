@extends('store.control_panel.template')

@section('left_sidebar')
    @include('store.control_panel.partial.left_sidebar')
@endsection

@section('info')
    <div class="col-sm-9 padding-right">
        <div class="content-right">
            <h2 class="panel-name">{{$panelName}}</h2>

            <div class="orders">
                @if(count($orders))
                    @include('store.control_panel.orders.partial.table_list')

                    @if($pagination)
                        {!! $orders->render() !!}
                    @endif
                @else
                    <h4>Nenhum pedido encontrado.</h4>
                @endif
            </div>
        </div>
    </div>
@endsection

