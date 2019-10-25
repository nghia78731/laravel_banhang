<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'id_type', 'description', 'unit_price', 'promotion_price', 'image'];

    public function Type_Products () {

        return $this->belongsTo('App\Type_Products', 'id_type', 'id');
    }

    public function Bill_Detail () {

        return $this->hasMany('App\Bill_Detail', 'id_product', 'id');
    }
}
