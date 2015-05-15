<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // permite o Mass Assignment
    protected $fillable = [
        'id',
        'name',
    ];

    // relacionamento com Product
    public function products()
    {
        return $this->hasMany('CodeCommerce\Product');
    }
}