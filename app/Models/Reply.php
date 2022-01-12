<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
	//
	protected $table = 'reply';
	protected $primaryKey = 'id';

	protected $hidden = ["idUser", "reply", "updated_at"];

	public function user()
	{
		return $this->belongsTo('App\User', 'idUser', 'id');
	}

	public function product()
	{
		return $this->belongsTo('App\Models\Product', 'reply', 'id');
	}
}
