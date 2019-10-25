<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table = 'bills';

    public function Bill_Detail () {

        return $this->hasMany('App\Bill_Detail', 'id_bill', 'id');
    }
}
