<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    //
	protected $table = "bills";
	
	public function user(){
		return $this->belongsTo('App\User','idUser','id');
	}
}
