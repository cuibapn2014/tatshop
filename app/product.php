<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
	protected $table = "product";
	public $timestamps = false;
	protected $hidden = ['id_category','id_subcategory'];
	
	public function attr(){
		return $this->hasOne('App\Attribute','id_product','id');
	}
	
	public function image(){
		return $this->hasOne('App\Image','id_product','id');
	}

	public function category(){
		return $this->belongsTo('App\Category','id_category');
	}

	public function subcategory(){
		return $this->belongsTo('App\Subcategory','id_subcategory');
	}
}
