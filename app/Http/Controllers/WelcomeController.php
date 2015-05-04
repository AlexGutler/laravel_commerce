<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;

class WelcomeController extends Controller {

	private $categories;

	public function __construct(Category $category)
	{
		$this->middleware('guest');
        $this->categories = $category;
	}

	public function index()
	{
		return view('welcome');
	}

//    public function exemplo()
//    {
//        $nome = 'Alex';
//        $sobrenome = 'Gutler';
////        return view('clients/exemplo')->with('nome', $nome);
//        return view('clients/exemplo', ['nome' => $nome, 'sobrenome' => $sobrenome]);
//    }

    public function exemplo()
    {
        $categories = $this->categories->all();
        return view('exemplo', compact('categories'));
    }

}
