<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
	protected $table = "payment";
	public $timestampt = true;
	
	public function product(){
		return $this->belongsTo('App\Product','id_product','id');
	}
	
	public function user(){
		return $this->belongsTo('App\User','idUser','id');
	}
	
	public function bill(){
		return $this->belongsTo('App\Bill','code_bill','id');
	}
}
