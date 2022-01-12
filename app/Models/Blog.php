<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $table = "blog";

    public function _like()
    {
        return $this->hasMany('App\Models\_like', 'id_blog', 'id');
    }
}
