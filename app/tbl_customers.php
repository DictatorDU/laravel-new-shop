<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_customers extends Model
{
    protected $fillable = ['customer_name','email','phone','password','address'];
}
