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

	public function category(){
		return $this->belongsTo('App\category','id_category','id');
	}

	public function subcategory(){
		return $this->belongsTo('App\subcategory','id_subcategory','id');
	}
}
