<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use CodeCommerce\Http\Requests\ProductImageRequest;

class AdminProductsController extends Controller {
    private $productModel;

    public function __construct(Product $productModel)
    {
//        $this->middleware('auth');
        $this->productModel = $productModel;
    }

	public function index()
	{
        //$products = $this->productModel->all();

        // gera a poginação do resultados
        $products = $this->productModel->paginate(10);
        return view('admin.products.index', compact('products'));
	}

    public function create(Category $category)
    {
        // gera a listagem de categorias para exibir no combo - param 1 = name // param 2 = id
        $categories = $category->lists('name', 'id');
        return view('admin.products.create', compact('categories'));
    }

    public function store(Requests\ProductRequest $request, Tag $tagModel)
    {
        // armazena todos os dados da requisição na variavel
        $input = $request->all();

        // fill - preenche os dados
        $product = $this->productModel->fill($input);
        // aplica no banco
        $product->save();

        // 'sincroniza as tags do produto'
        $syncTags = $this->syncTags($request, $tagModel);
        $product->tags()->sync($syncTags);

        return redirect()->route('admin.products.index');
    }

    public function edit(Category $category, $id)
    {
        // busca o produto
        $product = $this->productModel->find($id);
        // gera a listagem de categorias para exibir no combo - param 1 = name // param 2 = id
        $categories = $category->lists('name', 'id');
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Requests\ProductRequest $request, Tag $tagModel, $id)
    {
        // atualiza o registro com os dados do request
        $this->productModel->find($id)->update($request->all());

        // 'sincroniza as tags do produto'
        $syncTags = $this->syncTags($request, $tagModel);
        $this->productModel->find($id)->tags()->sync($syncTags);

        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        // verificar se o diretório existe
        if (is_dir(public_path().'/uploads/images/products/'.$id.'/'))
        {
            // exclui os arquivos e o diretório através da função delTree($dir);
            $this->delTree(public_path().'/uploads/images/products/'.$id.'/');
        }

        // busca e deleta o produto
        $this->productModel->find($id)->delete();

        return redirect()->route('admin.products.index');
    }

    public function show($id){}

    public function images($id)
    {
        // busca o produto
        $product = $this->productModel->find($id);
        return view('admin.products.images', compact('product'));
    }

    public function createImage($id)
    {
        // busca o produto
        $product = $this->productModel->find($id);
        return view('admin.products.create_image', compact('product'));
    }

    public function storeImage(ProductImageRequest $request, ProductImage $productImage, $id)
    {
        // buscar a imagem do request
        $file = $request->file('image');
        // armazenar a extensão da imagem
        $extension = $file->getClientOriginalExtension();

        // criar o registro da imagem
        $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);

        // salvar em disco
        Storage::disk('products_local')->put($id.'/'.$image->id.'.'.$image->extension, File::get($file));
        //Storage::disk('dropbox')->put($id.'/'.$image->id.'.'.$image->extension, File::get($file));

        return redirect()->route('admin.products.images', ['id' => $id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        // buscar a imagem
        $image = $productImage->find($id);

        // instanciar o produto vinculado a imagem
        $product = $image->product;

        // verificar se o arquivo existe
        if (file_exists(public_path().'/uploads/images/products/'.$product->id.'/'.$image->id.'.'.$image->extension))
        {
            // excluir o arquivo
            Storage::disk('products_local')->delete($product->id.'/'.$image->id.'.'.$image->extension);
        }

        // deletar o registro da imagem
        $image->delete();

        return redirect()->route('admin.products.images', ['id' => $product->id]);
    }

    public function syncTags(Requests\ProductRequest $request, Tag $tagModel)
    {
        // recebo as tags via request removendo espaço entre caracteres
        $tagsReplace = str_replace(' ', '', $request->get('tags'));
        // crio o array de tags separadas por vírgula
        $tags = explode(',', $tagsReplace);
        // instancio o array que vai guardar os ids tags tags relacionadas
        $syncTags = array();
        foreach($tags as $tag)
        {
            // consulta para saber se já tem uma Tag com esse nome no banco
            $count = $tagModel->where('name', '=', $tag)->count();

            // se não existir, adiciono o registro e coloco o id de retorno no array ralacionado,
            // senão busco o id da Tag e adiciono no array relacionado
            if ($count == 0)
            {
                $tagAux = $tagModel::create(['name' => $tag]);
                $syncTags[] = $tagAux->id;
            }
            else
            {
                $tagAux = $tagModel->where('name', '=', $tag)->first();
                $syncTags[] = $tagAux->id;
            }
        }

        return $syncTags;
    }

    public function delTree($dir) {
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file)
        {
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }
}
