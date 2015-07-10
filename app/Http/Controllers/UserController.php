<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    protected  $orderModel;

    public function __construct(Order $order)
    {
        $this->orderModel = $order;
    }

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
        $pagination = false;
        $panelName = 'Últimos pedidos';

        // pegando as últimas 5 compras ordenando pela data
        $orders = $this->orderModel->where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->take(5)->get();
        $id = Auth::user()->id;

        return view('store.control_panel.orders.orders_list', compact('orders', 'id', 'pagination', 'panelName'));
    }

    public function orderDetail($id)
    {
        $order = $this->orderModel->find($id);
        return view('store.control_panel.orders.order_detail', compact('order'));
    }

    public function openedOrders()
    {
        $pagination = true;
        $panelName = 'Pedidos em aberto';

        // pegando os pedidos em aberto (status < 4)
        $orders = $this->orderModel
            ->where('user_id', '=', Auth::user()->id)
            ->where('status', '<', 4)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $id = Auth::user()->id;

        return view('store.control_panel.orders.orders_list', compact('orders', 'id', 'pagination', 'panelName'));
    }

    public function deliveredOrders()
    {
        $pagination = true;
        $panelName = 'Pedidos entregues';

        // pegando os pedidos entregues (status = 4)
        $orders = $this->orderModel
            ->where('user_id', '=', Auth::user()->id)
            ->where('status', '=', 4)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $id = Auth::user()->id;

        return view('store.control_panel.orders.orders_list', compact('orders', 'id', 'pagination', 'panelName'));
    }

    public function ordersByNumber(Request $request)
    {
        $panelName = 'Pedidos por número';

        $numero = $request->get('numero');

        $orders = null;

        if(isset($numero)){
            // pegando os pedidos entregues (status = 4)
            $orders = $this->orderModel
                ->where('user_id', '=', Auth::user()->id)
                ->where('id', '=', $numero)
                ->get();
        }

        $id = Auth::user()->id;

        return view('store.control_panel.orders.orders_by_number', compact('orders', 'id', 'panelName', 'numero'));
    }

    public function ordersByDate(Request $request)
    {
        $panelName = 'Pedidos por período';

        if (isset($request)) {

        $deArray = explode('/', $request->get('de'));
        $de = $deArray[2] . '-' . $deArray[1] . '-' . $deArray[0];

        $ateArray = explode('/', $request->get('ate'));
        $ate = $ateArray[2] . '-' . $ateArray[1] . '-' . $ateArray[0];
        }

        $orders = null;

        if(isset($de) and isset($ate)){
            // pegando os pedidos entregues (status = 4)
            $orders = $this->orderModel
                ->where('user_id', '=', Auth::user()->id)
                ->whereBetween('created_at', [$de, $ate])
                ->get();
        }

        $id = Auth::user()->id;

        return view('store.control_panel.orders.orders_by_period', compact('orders', 'id', 'panelName', 'de'));
    }

    public function allOrders()
    {
        $pagination = true;
        $panelName = 'Todos os pedidos';

        // pegando todos os pedidos com paginação
        $orders = $this->orderModel->where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
        $id = Auth::user()->id;

        return view('store.control_panel.orders.orders_list', compact('orders', 'id', 'pagination', 'panelName'));
    }
}
