<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
	protected $table = "bills";
	
	public function user(){
		return $this->belongsTo('App\User','idUser','id');
	}
}
