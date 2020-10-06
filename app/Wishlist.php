<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable=['id','user_id','category_id','name','price','description','image'];
}




