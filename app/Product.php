<?php
namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // permite o Mass Assignment
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'featured',
        'recommend'
    ];

    // relacionamento com Category
    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }

    // relacionamento com ProductImage
    public function images()
    {
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    // relacionamento com tags
    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    // gera um atributo
    public function getNameDescriptionAttribute()
    {
        return $this->name.' - '.$this->description;
    }

    // retornar as tags separadas por ','
    public function getTagListAttribute()
    {
        $tags = $this->tags()->lists('name');

        return implode(',', $tags);
    }
}