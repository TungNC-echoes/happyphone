<?php

namespace App\Providers;

use App\Catalog;
use App\Product;
use Illuminate\Support\ServiceProvider;
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
        //share data for view header
        view()->composer([
            'site.header',
            'site.catalog.index',
            'admin.product.view',
            'admin.product.add',
            'admin.product.edit',
            'admin.catalog.view'
        ],function ($view){
            $loaisp = Catalog::all();
            $view->with('loaisp',$loaisp);
        });
//        view()->composer('site.header',function ($view){
//            $cart = Cart::content();
//            $image = array();
//            foreach ($cart as $row){
//                $image[$row->id] = Product::find($row->id)->image;
//            }
//            $view->with([
//                'cart' => $cart,
//                'total' =>Cart::total(),
//                'count' => count($cart),
//                'image' => $image
//            ]);
//        });
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
