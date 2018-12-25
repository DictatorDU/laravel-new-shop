<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_catagory;
use App\tbl_product;
use App\tbl_advertise_one;
use App\tbl_customers;
use DB;
use Mail;
use Session;
use Cart;
class ajaxController extends Controller{
  
  //Front-End start
	public function emailExistenceInfo($email){
     $existenceEmail = DB::table('users')->where("email",$email)->first();
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email is invalid";
      } elseif($existenceEmail) {
        echo("This E-mail address already exits");
      }
   } 

    public function phoneValidation($phone){
      $phoneResult = DB::table('users')->where('phone',$phone)->first();
      if($phoneResult){
        echo "Phone Number already exits";
      }
   }
   //Front-end end
   
}