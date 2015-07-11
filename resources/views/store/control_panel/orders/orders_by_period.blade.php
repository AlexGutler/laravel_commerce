@extends('store.control_panel.template')

@section('left_sidebar')
    @include('store.control_panel.partial.left_sidebar')
@endsection

@section('info')
    <div class="col-sm-9 padding-right">
        <div class="content-right">
            <h2 class="panel-name">{{$panelName}}</h2>

            <form class="form-inline periodo-form" role="form" method="post" action="{{route('panel.orders_by_period')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="de">Período:</label>
                    <input type="date" required class="form-control" id="de" style="width: 120px;" name="de" placeholder="mm/YYYY" value="{{isset($de) ? $de : null}}">
                </div>
                <div class="form-group">
                    <label for="ate">-</label>
                    <input type="date" required class="form-control" id="ate" style="width: 120px;" name="ate" placeholder="mm/YYYY" value="{{isset($ate) ? $ate : null}}">
                </div>
                <button type="submit" class="btn btn-info">Buscar</button>
            </form>

            @if(count($orders))
                <div class="orders">
                    @include('store.control_panel.orders.partial.table_list')

                    {!! $orders->render() !!}
                </div>
            @elseif(isset($de) && isset($ate))
                <h4 class="no-orders"><i class="fa fa-exclamation-circle fa-3x"></i>Nenhum pedido encontrado.</h4>
            @endif
        </div>
    </div>
@endsection

