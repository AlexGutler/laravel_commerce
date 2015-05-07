<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use Illuminate\Http\Request;

class AdminProductsController extends Controller {
    private $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

	public function index()
	{
        $products = $this->productModel->all();
        return view('admin.products.index', compact('products'));
	}

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Requests\CategoryRequest $request)
    {
        // armazena todos os dados da requisição na variavel
        $input = $request->all();
        $products = $this->productModel->fill($input); // fill - preenche os dados

        $products->save();

        return redirect()->route('admin.products.index');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $product = $this->productModel->find($id);
        return view('admin.categories.edit', compact('product'));
    }

    public function update(Requests\CategoryRequest $request, $id)
    {
        $this->productModel->find($id)->update($request->all());
        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $this->productModel->find($id)->delete();
        return redirect()->route('admin.products.index');
    }

}
