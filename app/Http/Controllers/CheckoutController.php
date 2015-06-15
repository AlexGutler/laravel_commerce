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
            //$cart->clear();

            Session::set('lastOrder', $order);
//
            //event(new CheckoutEvent(Auth::user(), $order));

            $checkout->setReference($order->id);
//            $checkout->setCustomer(Auth::user()->email);

            $response = $checkoutService->checkout($checkout->getCheckout());
            return redirect($response->getRedirectionUrl());

            // return view('store.checkout', compact('order', 'cart'));
        }

        return view('store.checkout', ['cart' => 'empty']);
    }


    public function pagSeguro(CheckoutService $checkoutService)
    {
        $checkout = $checkoutService->createCheckoutBuilder()
            ->addItem(new Item(1, 'Televisão LED 500', 8999.99))
            ->addItem(new Item(2, 'Video-game mega ultra blaster', 799.99))
            ->getCheckout();

        $response = $checkoutService->checkout($checkout);

        return redirect($response->getRedirectionUrl());
    }

    public function pagSeguroFindTransaction(Locator $service)
    {
        try {
            //CD69A88BA95A467BA8048E1E1D4F4FCD
            $transaction = $service->getByCode('DCEC1B44EA934ED084F9B69E45D8081F');
            var_dump($transaction->getDetails()->getReference());
            //var_dump($transaction);
            //var_dump($transaction->getDetails()->getStatus()); // Exibe na tela a transação
            //print_r($transaction->getItems()->get(0)->getDescription()); // Exibe na tela a transação
        } catch (PagSeguroException $error) { // Caso ocorreu algum erro
            echo $error->getMessage(); // Exibe na tela a mensagem de erro
        }
    }
}
