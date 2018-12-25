<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_brands extends Model
{
   protected $fillable = ['brand_name','brand_descript','publication_status'];
}
