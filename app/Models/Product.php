<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "product";

    public $timestamps = false;

    protected $hidden = ['id_category', 'id_subcategory'];
    protected $guarded = ["_token"];

    public function attr()
    {
        return $this->hasMany('App\Models\Attribute', 'id_product', 'id');
    }

    public function image()
    {
        return $this->hasMany('App\Models\Image', 'id_product', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'id_category');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory', 'id_subcategory');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Reply', 'reply', 'id');
    }
}
