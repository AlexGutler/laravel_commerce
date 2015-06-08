<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model {

	protected $fillable = [
		'user_id',
		'nome_endereco',
		'nome_endereco_desc',
		'endereco',
		'numero',
		'complemento',
		'referencia',
		'bairro',
		'cidade',
		'estado',
		'cep'
	];

	public function user()
	{
		return $this->belongsTo('CodeCommerce\User');
	}
}
