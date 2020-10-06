<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable=['id','category_id','name','price','description','image'];

    public function category($value='')
    {
        return $this->belongsTo('App\Category');
    }

}

