<?php
namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    // permite o Mass Assignment
	protected $fillable = [
        'name',
        'description'
    ];

    // faz o relaciomanento com products dizendo que é oneToMany
    public function products()
    {
        return $this->hasMany('CodeCommerce\Product');
    }

    // Query Scope
    public function byName($categoryName)
    {
        return $this->where('name', '=', $categoryName);
    }
}
