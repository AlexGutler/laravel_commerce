@extends('app')

@section('title')
    <title>CodeCommerce - Admin - Editing Order</title>
@endsection

@section('content')

    <div class="container">
        <h1>Editing Order: {{$order->id}}</h1>

        @if ($errors->any())
            <ul class="alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {{--
            * http://laravel.com/docs/4.2/html
            * http://laravelcollective.com/ * http://laravelcollective.com/docs/5.0/html
        --}}
        {!! Form::open( ['route' => ['admin.orders.update_status', $order->id, 'method' => 'put'] ] ) !!}
            <div class="form-group">
                {!! Form::label('user', 'User:') !!}
                {!! Form::text('user', $order->user->name, ['disabled' => 'disabled', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('items', 'Items:') !!}
                {!! Form::textarea('items', $items, ['disabled' => 'disabled', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('value', 'Value:') !!}
                {!! Form::text('value', $order->total, ['disabled' => 'disabled', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('status', 'Status:') !!}
                {!! Form::select('status',
                [
                '0'=>'Pedido Realizado',
                '1'=>'Autorização de Pagamento',
                '2'=>'Nota fiscal eletrônica/Separação em estoque',
                '3'=>'Produto(s) em transporte',
                '4'=>'Produto(s) entregues',
                '5'=>'Pedido Cancelado'
                ],
                $order->status,
                ['class' => 'form-control ']) !!}
            </div>

            <div class="form-group">
                {!! Form::hidden('_method', 'put') !!}
                {!! Form::submit('Update Order', ['class' => 'btn btn-primary']) !!}
                <a href="{{route('admin.orders.index')}}" class="btn btn-default">Cancel</a>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
