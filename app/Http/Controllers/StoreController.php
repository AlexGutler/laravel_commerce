<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use Illuminate\Http\Request;

class StoreController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Category $category, Product $product)
	{
        $prodFeatured = $product->featured()->get();
        $prodRecommended = $product->recommend()->get();
        $categories = $category->all();
		return view('store.index', compact('categories', 'prodFeatured', 'prodRecommended'));
	}

    public function categoryList(Category $category, $categoryName)
    {
        $categories = $category->all();
        $category = $category->byName($categoryName)->get()->first();
        $products = $category->products;
        return view('store.categories_list', compact('category', 'categories', 'products'));
    }

    public function category(Category $category, Product $product, $id)
    {
        $categories = $category->all();
        $category = $category->find($id);
        $products = $product->ofCategory($id)->get(); // utilizando global scope
        return view('store.category', compact('category', 'categories', 'products'));
    }

    public function product(Category $category, Product $p, $id)
    {
        $categories = $category->all();
        $product = $p->find($id);

        return view('store.product', compact('categories', 'product'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
