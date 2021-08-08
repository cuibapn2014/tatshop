<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    //
    protected $table = "subcategory";
    public $timestamps = false;

    public function category(){
        return $this->belongsTo('App\category','id_category','id');
    }
}
