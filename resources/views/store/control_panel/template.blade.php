@extends('store.store')

@section('title')
    Painel de Controle CodeCommerce
@endsection

@section('content')
    <div class="container servicos">
        <h1>Meus Serviços</h1>
        <p>Olá, <strong>{{Auth::user()->name}}</strong> (se não for você, <a href="{{url('/auth/logout')}}">Clique Aqui!</a>)</p>
    </div>
    @yield('left_sidebar')
    @yield('info')
@endsection