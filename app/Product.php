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

    // Accessors & Mutators - geram um atributos (concatenação) $p->tagList
        // gera um atributo
        public function getNameDescriptionAttribute()
        {
            return $this->name.' - '.$this->description;
        }
        // retornar as tags separadas por ', '
        public function getTagListAttribute()
        {
            $tags = $this->tags()->lists('name');
            // gera o implode da coleção de tags separando por ', '
            return $tags->implode(', ');
        }

    // Query Scope
    public function scopeFeatured($query)
    {
        return $query->where('featured', '=', 1);
    }
    public function scopeRecommend($query)
    {
        return $query->where('recommend', '=', 1);
    }

    /* Global Scope */
    public function scopeOfCategory($query, $type){
        return $query->where('category_id', '=', $type);
    }
}