<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
	protected $table = "payment";
	public $timestampt = true;
	protected $hidden = ["id","code_bill","created_at","updated_at"];
	
	public function product(){
		return $this->hasOne('App\Models\Product','id','id_product');
	}
	
	public function user(){
		return $this->belongsTo('App\User','idUser','id');
	}
	
	public function bill(){
		return $this->belongsTo('App\Models\Bill','code_bill','id');
	}
}
