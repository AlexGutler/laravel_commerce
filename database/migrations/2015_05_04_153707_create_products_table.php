<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	public function up()
	{
        // criar a tabela
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 255);
			$table->text('description');
			$table->decimal('price', 10, 2);
			$table->boolean('featured');
			$table->boolean('recommend');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}

}
