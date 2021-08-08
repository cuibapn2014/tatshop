<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $table = "category";
    public $timestamps = false;

    public function product(){
        return $this->hasMany('App\product','id_category','id');
    }
    public function subcategory(){
        return $this->hasMany('App\subcategory','id_category','id');
    }
}
