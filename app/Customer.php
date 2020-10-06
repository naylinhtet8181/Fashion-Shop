<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=['user_id','name','email','address','city','state','zip',
    'name_on_card','credit_card_number','exp_month','exp_year','cvv'];
}
