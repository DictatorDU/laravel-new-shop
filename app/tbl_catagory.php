<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_catagory extends Model{
    
    protected $fillable = ['cat_name','cat_descript','publication_status'];
}
