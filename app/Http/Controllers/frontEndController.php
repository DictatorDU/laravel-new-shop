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
class frontEndController extends Controller{
   

   public function index(){
      $arrival_products   = tbl_product::where("publication_status",1)->orderBy("id",'ASC')->take(4)->get();      
      $new_products   = tbl_product::where("publication_status",1)->orderBy("id",'DESC')->take(4)->get();
      $slides = tbl_advertise_one::all();
   	 return view("front-end.home",[
         'arrival_products'=>$arrival_products,
         'slides' => $slides,
         'new_products' => $new_products
       ]);
   }

   public function frontcatagory_productInfo($id){
      $frontProductCatagory = tbl_product::where("catagory_id",$id)->where("publication_status",1)->orderBy("id","DESC")->get();
   	 return view("front-end.catagories.catagory-product",[
         'frontProductCatagory'=>$frontProductCatagory
       ]);
   }  
   
   public function frontBrand_productInfo($id){
    $frontProductBrand = tbl_product::where("brand_id",$id)->where("publication_status",1)->orderBy("id","DESC")->get();
      return view("front-end.brands.brand",[
        "frontProductBrand" => $frontProductBrand
      ]);
   }

   public function prduct_preview_info($id){
      $productDetials = DB::table("tbl_products")->join("tbl_brands","tbl_products.brand_id","=","tbl_brands.id")->select("tbl_products.*","tbl_brands.brand_name")->where("tbl_products.publication_status",1)->where("tbl_products.id",$id)->get();
       $recentProduct  = tbl_product::where('publication_status',1)->orderBy("id",'DESC')->take(5)->get();
       $reletedProduct = tbl_product::where("publication_status",1)->where("catagory_id",13)->orderBy("id","DESC")->take(4)->get();
   	 return view("front-end.products.single",[
         'productDetials' => $productDetials,'recentProduct'  => $recentProduct,'reletedProduct' => $reletedProduct
      ]);
   }   

   public function cartAddInfo(Request $request){
    Cart::add(array(
      'id' => $request->id,
      'name' => $request->product_name,
      'price' => $request->product_price,
      'quantity' =>$request->product_quantity,
      'attributes' => array(
        'img' => $request->product_img,
        'brand' => $request->product_brand,
      )
     ));
     return redirect('/checkout/cart.html');
   }

  public function checkout(){
      if(Cart::isEmpty()){
        return view("front-end.checkout.cart");
      }else{
        $allCartData = Cart::getContent();
        return view("front-end.checkout.cart",[
         'allCartData' => $allCartData
         ]);
      }
   }
   public function removeCartInfo($id){
     Cart::remove($id);
     return redirect('/checkout/cart.html');
   }

   public function updateCartInfo(Request $request){
     Cart::update($request->id, array(
        'quantity' => $request->quantity
     ));
     return redirect('/checkout/cart.html');
   }

   public function contact(){
   	return view("front-end.contact.customer-contact");
   }   

   public function user_login(){
   	return view("front-end.user-auth.login");
   }

   public function user_signup(){
    return view("front-end.user-auth.signup");
   }   
   
}
