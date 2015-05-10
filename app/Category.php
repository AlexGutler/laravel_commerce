<?php
namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    // permite o Mass Assignment
	protected $fillable = [
        'name',
        'description'
    ];

    // faz o relaciomanento com products dizendo que oneToMany
    public function products()
    {
        return $this->hasMany('CodeCommerce\Product');
    }
}
