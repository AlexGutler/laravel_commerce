<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
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
        //$products = $this->productModel->all();
        $products = $this->productModel->paginate(10);
        return view('admin.products.index', compact('products'));
	}

    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');

        return view('admin.products.create', compact('categories'));
    }

    public function store(Requests\ProductRequest $request)
    {
        // armazena todos os dados da requisição na variavel
        $input = $request->all();
        $products = $this->productModel->fill($input); // fill - preenche os dados

        $products->save();

        return redirect()->route('admin.products.index');
    }

    public function edit(Category $category, $id)
    {
        $product = $this->productModel->find($id);
        $categories = $category->lists('name', 'id');
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Requests\ProductRequest $request, $id)
    {
        $this->productModel->find($id)->update($request->all());
        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $this->productModel->find($id)->delete();
        return redirect()->route('admin.products.index');
    }

    public function show($id){}
}
