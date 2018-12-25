<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\tbl_catagory;
use App\tbl_brands;
use App\orders;
use Cart;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('front-end.inc.header',function($view){
           $view->with("catagories",tbl_catagory::where("publication_status",1)->get());
           $view->with("brands",tbl_brands::where("publication_status",1)->get());
        });        

        View::composer('admin.master',function($view){
           $view->with("ordersCount",orders::where('order_status','pending')->count());
        });  

        View::composer('front-end.inc.header',function($view){
           $view->with("cartCount",Cart::getContent()->count());
        });        
        View::composer('front-end.inc.header',function($view){
           $view->with("cartPrice",Cart::getContent());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
