<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
	protected $table = 'district';
	
	public function ward(){
		return $this->hasOne('App\Models\Ward','district','id');
	}
}
