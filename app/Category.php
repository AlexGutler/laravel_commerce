<?php
namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    // permite o Mass Assignment
	protected $fillable = ['name', 'description'];
}
