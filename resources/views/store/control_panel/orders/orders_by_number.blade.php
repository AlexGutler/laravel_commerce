@extends('store.control_panel.template')

@section('left_sidebar')
    @include('store.control_panel.partial.left_sidebar')
@endsection

@section('info')
    <div class="col-sm-9 padding-right">
        <div class="content-right">
            <h2 class="panel-name">{{$panelName}}</h2>

            <form class="form-inline numero-form" role="form" method="post" action="{{route('panel.orders_by_number')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="numero">Número do pedido:</label>
                    <input type="text" value="{{isset($numero) ? $numero : null}}" class="form-control" id="numero" style="width: 100px;" name="numero" required>
                </div>
                <button type="submit" class="btn btn-info">Buscar</button>
            </form>

            @if(count($orders))
                <div class="orders">
                    @include('store.control_panel.orders.partial.table_list')
                </div>
            @elseif(isset($numero))
                <h4 class="no-orders"><i class="fa fa-exclamation-circle fa-3x"></i>Nenhum pedido encontrado.</h4>
            @endif
        </div>
    </div>
@endsection

