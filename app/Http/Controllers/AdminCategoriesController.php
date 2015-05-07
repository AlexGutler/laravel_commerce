<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminCategoriesController extends Controller {
    private $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

	public function index()
	{
        $categories = $this->categoryModel->all();

        return view('admin.categories.index', compact('categories'));
	}

	public function create()
	{
        return view('admin.categories.create');
	}

    public function store(Requests\CategoryRequest $request)
    {
        // armazena todos os dados da requisição na variavel
        $input = $request->all();
        $category = $this->categoryModel->fill($input); // fill - preenche os dados

        $category->save();

        return redirect()->route('admin.categories.index');
    }

	public function show($id)
	{
	}

	public function edit($id)
	{
        $category = $this->categoryModel->find($id);
        return view('admin.categories.edit', compact('category'));
	}

	public function update(Requests\CategoryRequest $request, $id)
	{
        $this->categoryModel->find($id)->update($request->all());
        return redirect()->route('admin.categories.index');
	}

	public function destroy($id)
	{
        $this->categoryModel->find($id)->delete();
        return redirect()->route('admin.categories.index');
	}

}
