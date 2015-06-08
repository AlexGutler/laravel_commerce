<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Order;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller {
    protected $orderModel;

    public function __construct(Order $order)
    {
        $this->orderModel = $order;
    }

	public function index()
	{
		$orders = $this->orderModel->paginate(10);
        return view('admin.orders.index', compact('orders'));
	}

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $order = $this->orderModel->find($id);
        $items = '';
        foreach ($order->items as $item) {
            $items .= $item->product->name.'; ';
        }

        return view('admin.orders.edit', compact('order', 'items'));
    }

    public function updateStatus(Request $request, $id)
    {
        $this->orderModel->find($id)->update($request->all());
        return redirect()->route('admin.orders.index');
    }


}
