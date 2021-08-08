<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    //
    protected $table = "blog";

    public function _like(){
    	return $this->hasMany('App\_like','id_blog','id');
    }
}
