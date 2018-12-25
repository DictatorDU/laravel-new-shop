<?php
//Front routes start
//Front routes start

Route::get("/",[
	'uses' => "frontEndController@index",
	'as'   => "/index"
]);
Route::get("/product/catagory/{id}.html",[
	'uses' => "frontEndController@frontcatagory_productInfo",
	'as'   => "/front_catagory_product"
]);

Route::get("/product/brand/{id}.html",[
	'uses' => "frontEndController@frontBrand_productInfo",
	'as'   => "/front_brand_product"
]);

Route::get("/customer/contact.html",[
	'uses' => "frontEndController@contact",
	'as'   => "/contact"
]);

Route::get("/checkout/cart.html",[
	'uses' => "frontEndController@checkout",
	'as'   => "/user-checkout"
]);

Route::post("/checkout/add-to-cart.html",[
	'uses' => 'frontEndController@cartAddInfo',
	'as'   => "/add_to_cart"
]);

Route::get('/checkout/cart/{id}.html',[
	'uses' => "frontEndController@removeCartInfo",
	'as'   => "/removeCart"
]);

Route::post('/checkout/quantity-update.html',[
	'uses' => "frontEndController@updateCartInfo",
	'as'   => "/productQuantityUpCart"
]);

Route::get("/products/product-preview/{id}.html",[
	'uses' => "frontEndController@prduct_preview_info",
	'as'   => "/front_single_product"
]);

Route::get("cart/order-preview.html",[
	'uses' => "UserAuthController@orderPreviewInfo",
	'as'   => "order_preview"
]);

Route::get("/cart/order-getway-cheackout.html",[
	'uses' => "UserAuthController@orderGatwarCheckoutInfo",
	'as'   => "order_method"
]);

Route::post("/offline-order-successed.html",[
	'uses' => "UserAuthController@offlineOrderSuccessInfo",
	'as'   =>'offline_order'
]);

Route::post("/order/payment-method",[
	'uses' => "UserAuthController@paymentMethodInfo",
	'as'   => 'paymentMethod'
]);
Auth::routes();

//Customer Signup validation start
Route::get("/emailExistence/{email}",[
	'uses' => 'ajaxController@emailExistenceInfo',
	'as'   => "emailExistence"
]);

Route::get("/phoneValidation/{phone}",[
	'uses' => 'ajaxController@phoneValidation',
	'as'   => "phoneValidation"
]);

//Customer signup validation end
//Front Routes End
//Front Routes End



//Admin Routes start
//Admin Routes start

//Admin Authintication
// Authentication Routes...
$this->get('admin-login', 'Admin\LoginController@showLoginForm')->name('admin.login');
$this->post('admin-login', 'Admin\LoginController@adminlogin')->name('admin.login');
$this->post('admin-logout', 'Admin\LoginController@logout')->name('admin.logout');

Route::get("/admin-home",[
	'uses' => 'adminController@index',
	'as'   => "/admin.home"
]);

Route::get("home",[
	'uses' => 'adminController@adminHome',
	'as'   => "/admin.home"
]);

Route::get('catagory_add',[
	'uses' => "adminController@catagory_add",
	'as'   => "/addCatagory"
]);
Route::get('catagory_list',[
	'uses' => "adminController@catagory_list",
	'as'   => "/cat_list"
]);

Route::get('un_published/{id}',[
	'uses' => "adminController@un_publishedInfo",
	'as'   => "/un-published"
]);

Route::get('published/{id}',[
	'uses' => "adminController@publishedInfo",
	'as'   => "/published"
]);

Route::get('cat_edit/{id}',[
	'uses' => "adminController@catEditInfo",
	'as'   => "/edit_cat"
]);

Route::post('edit_cat_box/',[
	'uses' => "adminController@editCatInfo",
	'as'   => "/edit_cat_tab"
]);

Route::get('catagory_delete/{id}',[
	'uses' => "adminController@delCatInfo",
	'as'   => "/del_cat"
]);

Route::post('/new_catagory',[
	 'uses' => "adminController@new_catagory",
	 'as'   => "/add_cat"
]);

Route::get('/new_brand',[
	'uses' => "adminController@new_brand_info",
	'as'   => "/add-brand"
]);

Route::post("/new_brand_add",[
	'uses' => "adminController@new_brand_infoadd",
	'as'   => "/brand_add"
]);

Route::get('/brand-list',[
	'uses' => "adminController@brand_info",
	'as'   => "/brand-list"
]);

Route::get("published-brand/{brand_id}",[
	'uses' => 'adminController@brand_published_info',
	'as'   => '/brand-published'
]);

Route::get("Un-published-brand/{brand_id}",[
	'uses' => 'adminController@brand_unpublished_info',
	'as'   => '/brand-unpublished'
]);

Route::get("delete-brand/{brand_id}",[
	'uses' => 'adminController@brand_delete_info',
	'as'   => '/brand-delete'
]);

Route::get("product-list",[
	'uses' => 'adminController@product_info',
	'as'   => '/product_list'
]);

Route::get("new-product",[
	'uses' => 'adminController@productAddInfo',
	'as'   => "/add_product"
]);

Route::post("new-product-add",[
	'uses' => 'adminController@new_productInfo',
	'as'   => '/new_product'
]);

Route::get("manage-product/{id}",[
	'uses' => "adminController@edit_product_info",
	'as'   => '/edit_product'
]);

Route::post("edit-product",[
	'uses' => "adminController@editProInfo",
	'as'   => "/update-product"
]);

Route::get("advertisement-manager",[
    'uses' => "adminController@advertisementInfo",
    'as'   => "/advertisement_list"
]);

Route::get("advertise-one.html",[
	'uses' => "adminController@advertiseOneInfo",
	'as'   => "/slider_edit"
]);

Route::post("slide-update.html",[
	'uses' => "adminController@advertiseSliderUpdateInfo",
	'as'   => "/slider_update"
]);

Route::get('new-order.html',[
	'uses' => "adminController@newOrderInfo",
	'as'   => "new_orders"
]);

Route::get('delete-order/{id}',[
	'uses' => 'adminController@deleteOrderInfo',
	'as'   => 'delete_order'
]);

Route::get('view-order/{id}',[
	'uses' => 'adminController@viewSingleOrder',
	'as'   => 'view_order'
]);

Route::get('order-invoice/{id}',[
	'uses' => 'adminController@invoiceInfo',
	'as'   => 'shipt_product'
]);
//Admin routes end
//Admin routes end
