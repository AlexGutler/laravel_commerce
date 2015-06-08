<?php namespace CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\Request;

class UserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        // http://laravel.com/docs/5.0/validation
        return [
            'name' => 'required|min:3|max:60',
            'email' => 'required|email',
            'password' => 'required|min:5|max:20',
            'endereco' => 'required|min:3|max:60',
            'nome_endereco' => 'required',
            'numero' => 'required|min:1|max:6',
            'referencia' => 'required|min:5|max:60',
            'bairro' => 'required|min:3|max:60',
            'cidade' => 'required|min:3|max:60',
            'estado' => 'required|min:2|max:2',
            'cep' => 'required|min:8|max:9',
        ];
	}

}
