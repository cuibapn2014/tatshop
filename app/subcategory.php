<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //
    protected $table = "subcategory";
    public $timestamps = false;
    protected $hidden = ['id_category','id_subcategory'];
    protected $primaryKey = "id_subcategory";

    public function category(){
        return $this->belongsTo('App\Category','id_category');
    }
}
