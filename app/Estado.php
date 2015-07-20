<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['nome'];

    public $timestamp = false;

    public function cidades()
    {
        return $this->hasMany('CodeCommerce\Cidade');
    }
}
