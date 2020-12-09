<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    //
	protected $table = 'district';
	
	public function ward(){
		return $this->hasOne('App\ward','district','id');
	}
}
