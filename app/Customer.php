<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = ['name', 'gender', 'email', 'address', 'phone_number', 'note', 'payment_method'];

    public function Bills () {

        return $this->hasMany('App\Bills', 'id_customer', 'id');
    }
}
