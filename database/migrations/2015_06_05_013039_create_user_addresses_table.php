<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_addresses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->smallInteger('nome_endereco');
			$table->char('nome_endereco_desc', 25);
			$table->string('endereco');
			$table->char('numero', 6);
			$table->string('complemento');
			$table->string('referencia');
			$table->string('bairro');
			$table->string('cidade');
			$table->char('estado', 2);
			$table->string('cep');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_addresses');
	}

}
