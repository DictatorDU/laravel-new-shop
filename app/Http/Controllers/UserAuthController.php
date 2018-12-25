<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\tbl_catagory;
use App\tbl_product;
use App\tbl_advertise_one;
use App\tbl_customers;
use App\orders;
use DB;
use Mail;
use Session;
use Cart;
class UserAuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   public function orderPreviewInfo(){
      if(Cart::isEmpty()){
        return view("front-end.checkout.order-preview");
      }else{
        $customerInfo = DB::table('users')->where('id',Auth::user()->id)->get();
        $allCartData = Cart::getContent();
        return view("front-end.checkout.order-preview",[
         'customerInfo' => $customerInfo,
         'allCartData' => $allCartData,
         ]);
      }
   }

   public function orderGatwarCheckoutInfo(){
      if(Cart::isEmpty()){
        return view("front-end.checkout.order-option");
      }else{
        $allCartData = Cart::getContent();
        return view("front-end.checkout.order-option",[
         'allCartData' => $allCartData
         ]);
      }
   }
   
   protected function orderSubmit($request,$allCartData){
    foreach($allCartData as $value){
      $orders = new orders();
       $orders->customer_id = Auth::user()->id;
       $orders->product_id = $value->id;
       $orders->product_name = $value->name;
       $orders->product_price = $value->price;
       $orders->img = $value->attributes->img;
       $orders->product_brand = $value->attributes->brand;
       $orders->product_quantity = $value->quantity;
       $orders->payment_type = $request->payment;
       $orders->save();
     }
     Cart::clear();
   }

   protected function cashin($request,$allCartData){
     $this->orderSubmit($request,$allCartData);
     return view("front-end.payment-systems.cash-in");
   }
   

   public function paymentMethodInfo(Request $request){
     $allCartData = Cart::getContent();
     if($request->payment == 'cid'){
      $this->cashin($request,$allCartData);
     }elseif($request->payment == 'bkash'){
       return "Bkash Payment Systems used";
     }elseif($request->payment == 'paypal'){
       return "Paypal Payment Systems used";
     }elseif($request->payment == 'payoneer'){
       return "Payoneer Payment Systems used";
     }elseif($request->payment == 'dbl'){
      return "Datch Bangla Payment Systems used";
     }elseif($request->payment == "bankAsia"){
      return "Bank Asia Payment Systems used";
     }
   }

}
