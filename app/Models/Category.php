<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "category";
    public $timestamps = false;
    protected $hidden = ['id_category'];
    protected $primaryKey = "id_category";

    public function product()
    {
        return $this->hasMany('App\Models\Product', 'id_category');
    }
    public function subcategory()
    {
        return $this->hasMany('App\Models\Subcategory', 'id_category');
    }
}
