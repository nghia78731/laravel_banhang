<?php

namespace App\Providers;

use App\Products;
use Illuminate\Support\Facades\Schema;
use App\Slide;
use App\Type_Products;
use Illuminate\Support\ServiceProvider;




class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $slides = Slide::all();
        $products = Products::where('new', 1)->paginate(4);
        $typeProducts = Type_Products::all();
        $iphone = Products::where('id_type', 1)->paginate(4);
        $randomProduct = Products::all()->random(3);
        Schema::defaultStringLength(191);
        view()->share('slides', $slides);
        view()->share('products', $products);
        view()->share('typeProducts', $typeProducts);
        view()->share('iphone', $iphone);
        view()->share('randomProduct', $randomProduct);
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
