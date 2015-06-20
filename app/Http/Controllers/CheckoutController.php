<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPSC\PagSeguro\Client\PagSeguroException;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Purchases\Transactions\Locator;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;

class CheckoutController extends Controller {

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function place(Order $orderModel, CheckoutService $checkoutService)
    {
        if(!Session::has('cart'))
        {
            return false;
        }

        $cart = Session::get('cart');

        if ($cart->getTotal() > 0)
        {
            $checkout = $checkoutService->createCheckoutBuilder();

            $order = $orderModel->create([
                'user_id' => Auth::user()->id,
                'total' => $cart->getTotal()
            ]);

            foreach($cart->all() as $k => $item)
            {
                $checkout->addItem(new Item($k, $item['name'], number_format($item['price'], 2, '.', ''), $item['qtd']));
                $order->items()->create([
                    'product_id' => $k,
                    'price' => $item['price'],
                    'qtd' => $item['qtd'],
                    'total' => $item['qtd'] * $item['price']
                ]);
            }

            Session::forget('cart');
            //event(new CheckoutEvent(Auth::user(), $order));
            //$checkout->setCustomer(Auth::user()->email);

            $checkout->setReference($order->id);
            $response = $checkoutService->checkout($checkout->getCheckout());
            return redirect($response->getRedirectionUrl());
            // return view('store.checkout', compact('order', 'cart'));
        }

        return view('store.checkout', ['cart' => 'empty']);
    }

    public function paymentReturn(Locator $service, Order $orderModel){
        $transaction = $_GET['transaction'];
        $transaction_find = $service->getByCode($transaction);
        $orderId = $transaction_find->getDetails()->getReference();
        $order = $orderModel->find($orderId);
        $order->update(['transaction' => $transaction]);
        //$lastOrder = Session::get('lastOrder');
        //Session::forget('lastOrder');
        return view('store.checkout', ['order' => $order, 'cart' => '']);
    }
}
