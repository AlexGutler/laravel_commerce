<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function orders()
    {
        $orders = Auth::user()->orders;

        return view('store.orders', compact('orders'));
    }


    public function home()
    {
        return view('store.control_panel.home');
    }

    public function lastOrders()
    {
        $orders = Auth::user()->orders;
        return view('store.control_panel.orders.last_orders', compact('orders'));
    }

    public function openedOrders()
    {
        return 'Pedidos em Aberto';
    }

    public function deliveredOrders()
    {
        return 'Pedidos Entregues';
    }

    public function ordersByNumber()
    {
        return 'Pedidos por Número';
    }

    public function ordersByDate()
    {
        return 'Pedidos por Data';
    }

    public function allOrders()
    {
        return 'Todos Pedidos';
    }
}
