<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_catagory;
use App\tbl_brands;
use App\tbl_product;
use App\orders;
use App\tbl_advertise_one;
use Image;
use DB;
use App;
use PDF;
class adminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.index');
    }

    public function adminHome(){
      return redirect("/admin-home");
    }

    public function catagory_add(){
        return view("admin.catagory.add-catagory");
    }

    public function catagory_list(){
        $catagories = tbl_catagory::all();
        return view("admin.catagory.cat-list",['catagories'=>$catagories]);
    }

    public function un_publishedInfo($id){
        $catagory = tbl_catagory::find($id);
        $catagory->publication_status = 2;
        $catagory->save();
        return redirect("/catagory_list")->with("danger_msg","Successfully Un-published catagory");
    }

    public function publishedInfo($id){
        $catagory = tbl_catagory::find($id);
        $catagory->publication_status = 1;
        $catagory->save();
        return redirect("/catagory_list")->with("msg","Successfully published catagory");
    }

    public function catEditInfo($id){
        $catagory = tbl_catagory::find($id);
        return view("admin.catagory.cat-edit",['editable_cat' => $catagory]);
    }

    public function delCatInfo($id){
        $catagory = tbl_catagory::find($id);
        $catagory->delete();
        return redirect("/catagory_list")->with("danger_msg","You have Successfully deleted catagory");
    }

    public function editCatInfo(Request $request){
        $catagory = tbl_catagory::find($request->id);
        $catagory->cat_name = $request->cat_name;
        $catagory->cat_descript = $request->cat_descript;
        $catagory->publication_status = $request->publication_status;
        $catagory->save();
        return redirect("/catagory_list")->with('msg','You have Successfully change catagory');
    }

    public function new_catagory(Request $request){
       $catagory = new tbl_catagory();

       $catagory->cat_name = $request->cat_name;
       $catagory->cat_descript = $request->cat_descript;
       $catagory->publication_status = $request->publication_status;
       $catagory->save();
       return redirect("/catagory_list")->with("msg","Successfully added catagory");
    }

    public function new_brand_info(){
        return view("admin.brand.brand-add");
    }

    public function new_brand_infoadd(Request $request){
        $this->validate($request,[
            "brand_name" => "required|string",
            "brand_descript" => "required",
            "publication_status" => "required"
        ]);

        $brand = new tbl_brands();
        $brand->brand_name = $request->brand_name;
        $brand->brand_descript = $request->brand_descript;
        $brand->publication_status = $request->publication_status;
        $brand->save();
        return redirect("/new_brand")->with("msg","Successfully added a new brand");
    }

    public function brand_info(){
        $brands = tbl_brands::all();
        return view("admin.brand.brand-list",['brands'=>$brands]);
    }

    public function brand_published_info($brand_id){
        $brands = tbl_brands::find($brand_id);
        $brands->publication_status = 1;
        $brands->save();
        return redirect("/brand-list")->with("msg","Successfully published the brand");
    }
    public function brand_unpublished_info($brand_id){
        $brands = tbl_brands::find($brand_id);
        $brands->publication_status = 2;
        $brands->save();
        return redirect("/brand-list")->with("msg","Successfully un-published the brand");
    }
    public function brand_delete_info($brand_id){
        $brand = tbl_brands::find($brand_id);
        $brand->delete();
        return redirect("/brand-list")->with("danger_msg",'You have Successfully Delete a brand');
    }

    public function product_info(){
        $products = DB::table("tbl_products")
                    ->join("tbl_catagories","tbl_products.catagory_id","=","tbl_catagories.id")
                    ->join("tbl_brands","tbl_products.brand_id","=","tbl_brands.id")
                    ->select("tbl_products.*","tbl_catagories.cat_name","tbl_brands.brand_name")
                    ->get();
        return view("admin.product.manage-product",['products' => $products]);
    }

    public function productAddInfo(){
        $catagories = tbl_catagory::where('publication_status',1)->get();
        $brands = tbl_brands::where('publication_status',1)->get();
        return view("admin.product.product-add",[
            'catagories' => $catagories,
            'brands' => $brands
        ]);
    }

    protected function productImgUpValid($request){
       $image = $request->file("product_img");
       $productImgName = $image->getClientOriginalName();
       $productPath = "admin/uploaded-products/";
       $productImage = $productPath.$productImgName;
       Image::make($image)->save($productImage);
       return $productImage;
    }

    protected function productSecondImg($request){
        $secondImg = $request->file("second_img");
        $secondImgName = $secondImg->getClientOriginalName();
        $secondImgPath = "admin/uploaded-products/";
        $secondImgProduct = $secondImgPath.$secondImgName;
        Image::make($secondImg)->save($secondImgProduct);
        return $secondImgProduct;
    }
    public function new_productInfo(Request $request){

       $productImage = $this->productImgUpValid($request);
       $secondImgProduct = $this->productSecondImg($request);

       $products = new tbl_product();
       $products->catagory_id = $request->catagory_id;
       $products->brand_id = $request->brand_id;
       $products->product_name = $request->product_name;
       $products->product_price = $request->product_price;
       $products->product_quantity = $request->product_quantity;
       $products->product_description = $request->product_description;
       $products->img = $productImage;
       $products->secondImg = $secondImgProduct;
       $products->publication_status = $request->publication_status;
       $products->save();

       return redirect("/new-product")->with("msg",'You have successfully added a new product');
    }

    public function edit_product_info($id){
           $catagory = tbl_catagory::where("publication_status",'1')
                                    ->get();

           $brand = tbl_brands::where("publication_status",'1')
                                    ->get();
           $editProduct = DB::table("tbl_products")
                ->join("tbl_catagories","tbl_products.catagory_id","=","tbl_catagories.id")
                ->join("tbl_brands","tbl_products.brand_id","=","tbl_brands.id")
                ->select("tbl_products.*","tbl_catagories.cat_name","tbl_brands.brand_name")
                ->where("tbl_products.id","=",$id)
                ->get();
        return view("admin.product.edit-product",[
            'editProduct' => $editProduct,
            'catagory'    => $catagory,
            'brand'    => $brand
        ]);
    }

    protected function imgOneUpdate($request,$firstImg){
        $firstImgName = $firstImg->getClientOriginalName();
        $imgPath = "admin/uploaded-products/";
        $imgRealPath = $imgPath.$firstImgName;
        Image::make($firstImg)->save($imgRealPath);
        return $imgRealPath;
    }

    protected function imgTwoUpdate($request,$secondImg){
        $secondImgName = $secondImg->getClientOriginalName();
        $imgPath = "admin/uploaded-products/";
        $imgRealPath = $imgPath.$secondImgName;
        Image::make($secondImg)->save($imgRealPath);
        return $imgRealPath;
    }

    protected function updateProduct($request,$products,$imgOnePath=Null,$imgTwoPath=Null){
        $products->catagory_id = $request->catagory_id;
        $products->brand_id = $request->brand_id;
        $products->product_name = $request->product_name;
        $products->product_price = $request->product_price;
        $products->product_quantity = $request->product_quantity;
        $products->product_description = $request->product_description;
        if($imgOnePath){
          $products->img = $imgOnePath;
        }
        if($imgTwoPath){
          $products->secondImg = $imgTwoPath;
        }
        $products->publication_status = $request->publication_status;
        $products->save();
    }
    public function editProInfo(Request $request){
      $firstImg  = $request->file("product_img");
      $secondImg = $request->file("second_img");
      $products = tbl_product::find($request->id);

      if($firstImg AND $secondImg == Null){
        unlink($products->img);
        $imgRealPath = $this->imgOneUpdate($request,$firstImg);
        $this->updateProduct($request,$products,$imgRealPath);
      }elseif($secondImg AND $firstImg == Null){
         unlink($products->secondImg);
         $imgRealPath = $this->imgTwoUpdate($request,$secondImg);
         $this->updateProduct($request,$products,$paramOne=Null,$imgRealPath);
      }elseif($firstImg AND $secondImg){
         unlink($products->img);
         unlink($products->secondImg);
         $imgOneRealPath = $this->imgOneUpdate($request,$firstImg);
         $imgTwoRealPath = $this->imgTwoUpdate($request,$secondImg);

         $this->updateProduct($request,$products,$imgOneRealPath,$imgTwoRealPath);
      }else{
        $this->updateProduct($request,$products);
      }
    return redirect("/product-list")->with("msg",'You have successfully update a product');
    }

	
	
	
	
	

    public function advertisementInfo(){
        $advertiseOne = tbl_advertise_one::all();
        return view("admin.advertise.index",[
          "advertiseOne" => $advertiseOne
        ]);
    }

    public function advertiseOneInfo(){
        $sliders = DB::table('tbl_advertise_ones')->get();
        return view("admin.advertise.add-one",[
            'sliders' => $sliders
        ]);
    }

    protected function sliderImgOne($img_one){
      $img_one_name = $img_one->getClientOriginalName();
      $imgPath = "admin/advertisement-img/advertise-one/";
      $imgRealPath = $imgPath.$img_one_name;
      Image::make($img_one)->save($imgRealPath);
      return $imgRealPath;
    }
    protected function sliderImgTwo($img_two){
      $img_two_name = $img_two->getClientOriginalName();
      $imgPath = "admin/advertisement-img/advertise-one/";
      $imgRealPath = $imgPath.$img_two_name;
      Image::make($img_two)->save($imgRealPath);
      return $imgRealPath;
    }
    protected function sliderImgThree($img_three){
      $img_three_name = $img_three->getClientOriginalName();
      $imgPath = "admin/advertisement-img/advertise-one/";
      $imgRealPath = $imgPath.$img_three_name;
      Image::make($img_three)->save($imgRealPath);
      return $imgRealPath;
    }
    protected function sliderImgFour($img_four){
      $img_four_name = $img_four->getClientOriginalName();
      $imgPath = "admin/advertisement-img/advertise-one/";
      $imgRealPath = $imgPath.$img_four_name;
      Image::make($img_four)->save($imgRealPath);
      return $imgRealPath;
    }

    protected function advertiseOneUp($request,$sliders,$sliderOne=Null,$sliderTwo=Null,$sliderThree=Null,$sliderFour=Null){
     if($sliderOne){
       $sliders->img_one = $sliderOne;
     }
     if($sliderTwo){
       $sliders->img_two = $sliderTwo;
     }
     if($sliderThree){
       $sliders->img_three = $sliderThree;
     }
     if($sliderFour){
       $sliders->img_four = $sliderFour;
     }
     $sliders->save();
    }

    public function advertiseSliderUpdateInfo(Request $request){
       $img_one  = $request->file("img_one");
       $img_two = $request->file("img_two");
       $img_three = $request->file("img_three");
       $img_four = $request->file("img_four");
       
       $sliders = tbl_advertise_one::find($request->id);

       if($img_one AND $img_two == Null AND $img_three == Null AND $img_four == Null){
         unlink($sliders->img_one);
         $imgRealPath = $this->sliderImgOne($img_one);
         $this->advertiseOneUp($request,$sliders,$imgRealPath,$sliderTwo=Null,$sliderThere=Null,$sliderFour=Null);
       }elseif($img_one == Null AND $img_two AND $img_three == Null AND $img_four == Null){
         unlink($sliders->img_two);
         $imgRealPath = $this->sliderImgTwo($img_two);
         $this->advertiseOneUp($request,$sliders,$sliderOne=Null,$imgRealPath,$sliderThere=Null,$sliderFour=Null);
       }elseif($img_one == Null AND $img_two == Null AND $img_three AND $img_four == Null){
         unlink($sliders->img_three);
         $imgRealPath = $this->sliderImgThree($img_three);
         $this->advertiseOneUp($request,$sliders,$sliderOne=Null,$sliderTwo=Null,$imgRealPath,$sliderFour=Null);
       }elseif($img_one == Null AND $img_two == Null AND $img_three == Null AND $img_four){
         unlink($sliders->img_four);
         $imgRealPath = $this->sliderImgFour($img_four);
         $this->advertiseOneUp($request,$sliders,$sliderOne=Null,$sliderTwo=Null,$sliderThree=Null,$imgRealPath);
       }elseif($img_one AND $img_two AND $img_three AND $img_four){
         unlink($sliders->img_one);
         unlink($sliders->img_two);
         unlink($sliders->img_three);
         unlink($sliders->img_four);

         $imgRealPathOne = $this->sliderImgOne($img_one);
         $imgRealPathTwo = $this->sliderImgTwo($img_two);
         $imgRealPathThree = $this->sliderImgThree($img_three);
         $imgRealPathFour = $this->sliderImgFour($img_four);
         $this->advertiseOneUp($request,$sliders,$imgRealPathOne,$imgRealPathTwo,$imgRealPathThree,$imgRealPathFour);
       }else{
         $this->advertiseOneUp($request,$sliders);
       }
       return redirect("/advertise-one.html")->with("msg",'<strong>Congratulation ! </strong>Slider Successfully Changed');
    }

    public function newOrderInfo(){
      $allOrders = DB::table("orders")->join("users","orders.customer_id","=","users.id")->join("tbl_products","orders.product_id","=","tbl_products.id")->select("orders.*","users.name","tbl_products.product_name")->get();
      return view('admin.orders.new-orders',[
        'allOrders' => $allOrders
      ]);
    }

    public function deleteOrderInfo($id){
      $deleteOrder = orders::find($id);
      $deleteOrder->delete();
      return redirect("new-order.html")->with("danger_msg","You have Successfully deleted orders");
    }

    public function viewSingleOrder($id){
      $singleOrders = DB::table("orders")->join("users","orders.customer_id","=","users.id")->join("tbl_products","orders.product_id","=","tbl_products.id")->select("orders.*","users.*","tbl_products.product_name")->where('orders.id',$id)->get();
      return view("admin.orders.order-preview",[
         'singleOrders'=>$singleOrders
      ]);
    }

    public function invoiceInfo($id){
       $data = DB::table("orders")->join("users","orders.customer_id","=","users.id")->join("tbl_products","orders.product_id","=","tbl_products.id")->select("orders.*","users.*","tbl_products.product_name")->where('orders.id',$id)->get();
        $pdf = PDF::loadView('admin.orders.invoice',[
          'data' => $data
        ]);
        return $pdf->stream('invoice.pdf');
    }
}