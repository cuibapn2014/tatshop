<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    //
	protected $table = "ward";
	
	public function district(){
		return $this->belongsTo('App\District','district','id');
	}
}
