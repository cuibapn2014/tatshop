<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
	protected $table = 'reply';
	public function user(){
		return $this->belongsTo('App\User','idUser','id');
	}
        
	public function product(){
		return $this->belongsTo('App\Product','reply','id');
	}

}
