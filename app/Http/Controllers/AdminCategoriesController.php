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
        //$categories = $this->categoryModel->all();

        // cria a paginação dos resultados
        $categories = $this->categoryModel->paginate(10);
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
        // fill - preenche os dados
        $category = $this->categoryModel->fill($input);
        // aplica no banco
        $category->save();

        return redirect()->route('admin.categories.index');
    }

	public function edit($id)
	{
        // busca o produto
        $category = $this->categoryModel->find($id);
        return view('admin.categories.edit', compact('category'));
	}

	public function update(Requests\CategoryRequest $request, $id)
	{
        // atualiza o registro com os dados do request
        $this->categoryModel->find($id)->update($request->all());
        return redirect()->route('admin.categories.index');
	}

	public function destroy($id)
	{
        // busca e deleta o registro
        $this->categoryModel->find($id)->delete();
        return redirect()->route('admin.categories.index');
	}

    public function show($id){}
}
