<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
	protected $table = "product";
	public $timestamps = false;
	
	public function attr(){
		return $this->hasOne('App\attribute','id_product','id');
	}
	
	public function image(){
		return $this->hasOne('App\image','id_product','id');
	}
}
