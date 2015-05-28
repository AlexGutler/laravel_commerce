<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TesteController extends Controller {

	public function getLogin()
    {
        $data = [
            'email' => 'alex11jgt@hotmail.com',
            'password' => '00fb00'
        ];

        if(Auth::attempt($data))
        {
            return 'logou...';
        }

        if(Auth::check())
        {
            return 'logado...';
        }

        return 'falhou...';
    }

    public function getLogout()
    {
        Auth::logout();

        if(Auth::check())
        {
            return "Logado";
        }

        return 'Não está logado';
    }

}
