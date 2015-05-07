<?php
namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    // permite o Mass Assignment
    protected $fillable = ['name', 'description', 'price', 'featured', 'recommend'];
}
