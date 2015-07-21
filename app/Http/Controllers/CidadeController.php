<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Estado;
use CodeCommerce\Http\Requests;
use Illuminate\Support\Facades\Response;

class CidadeController extends Controller
{
    private $estadoModel;

    public function __construct(Estado $estadoModel)
    {
        $this->estadoModel = $estadoModel;
    }

    function index()
    {
        $e = $this->estadoModel->lists('nome', 'id');
        $estados = array_merge(['0'=>'Selecione o Estado...'], $e->toArray());
        return view('cidade', compact('estados'));
    }

    public function getCidades($idEstado)
    {
        $estado = $this->estadoModel->find($idEstado);
        $cidades = $estado->cidades()->getQuery()->get(['id', 'nome']);

        return Response::json($cidades);
    }
}
