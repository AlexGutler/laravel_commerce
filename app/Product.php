<?php
namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    // permite o Mass Assignment
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'featured',
        'recommend'
    ];

    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }
}