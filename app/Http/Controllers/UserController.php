<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Order;
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

    public function lastOrders(Order $orderModel)
    {
//        $orders = Auth::user()->orders;
        $orders = $orderModel->where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->take(5)->get();
        $id = Auth::user()->id;
        return view('store.control_panel.orders.last_orders', compact('orders', 'id'));
    }

    public function orderDetail(Order $orderModel, $id)
    {
        $order = $orderModel->find($id);
        return view('store.control_panel.orders.order_detail', compact('order'));
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
