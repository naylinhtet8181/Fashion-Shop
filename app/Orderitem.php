<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    protected $fillable=['user_id','order_id','name','price','qty','image','total'];
}
