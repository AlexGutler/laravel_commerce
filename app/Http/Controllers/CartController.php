<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class CartController extends Controller
{
    private $cart;

    /**
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(Product $product)
	{
        if(!Session::has('cart'))
        {
            Session::set('cart', $this->cart);
        }
        return view('store.cart', ['cart' => Session::get('cart'), 'product' => $product]);
	}

    public function add($id)
    {
        $cart = $this->getCart();

        $product = Product::find($id);

        $cart->add($id, $product->name, $product->price);

        Session::set('cart', $cart);

        //return json_encode(['qtd' => $cart->getQtd($id)]);
        return redirect()->route('cart');
    }

    public function up($id)
    {
        $cart = $this->getCart();

        $product = Product::find($id);

        $cart->add($id, $product->name, $product->price);

        Session::set('cart', $cart);

        return json_encode(['qtd' => $cart->getQtd($id)]);
    }

    public function remove($id)
    {
        $cart = $this->getCart();

        $cart->remove($id);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }

    public function down($id)
    {
        $cart = $this->getCart();

        $cart->remove($id);

        Session::set('cart', $cart);

        return json_encode(['qtd' => $cart->getQtd($id)]);
    }

    public function destroy($id)
    {
        $cart = $this->getCart();
        $cart->destroy($id);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }

    public function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }

        return $cart;
    }

    public function change()
    {
        if(Request::ajax()) {
            $data = Request::all();
            print_r($data);die;
        }
    }
}
