<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_Products extends Model
{
    protected $table = 'type_products';
    protected $fillable = ['name', 'description', 'image', 'name_slug'];

    public function Products () {
        return $this->hasmany('App\Products', 'id_type', 'id');
    }

    public function setNameSlugAttribute($value) {
        $this->attributes['name_slug'] = str_slug($value);
    }

    public function setOriginalName($value) {
        $this->attributes['image'] = $value->getSize();
    }

}
