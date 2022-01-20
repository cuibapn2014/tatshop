<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Darryldecode\Cart\Cart;
use View, Auth, App\Models\Product;
use Carbon\Carbon;
use Cart, Session;
use App\Models\Reply, App\Models\Blog, App\Models\Category, App\Models\Deal, App\Models\CodeDiscount;
use Illuminate\Contracts\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
	
    /**
     * Register any application services.
     *
     * @return void
     */
	 
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $now = Carbon::now("Asia/Ho_Chi_Minh");
		$total = Cart::getTotal();
		$mostBuy = Product::orderBy("sold","desc")->take(10)->get();
		$sale = Product::where("discount",">",0)->orderBy("discount","desc")->take(8)->get();
		$comment = Reply::where("vote",">=",3)->take(10)->get();
		$blog = Blog::take(10)->get();
		$filters = Category::all();
		$deal = Deal::where("expired",">",$now)->orderBy('expired','desc')->get();
		$code = CodeDiscount::where("expire",">",$now)->orderBy('expire','desc')->get();
		View::share('data_share',['total' => $total,'mostBuy' => $mostBuy, 'sale' => $sale,'comment' => $comment,'blog' => $blog, 'deal' => $deal, 'code' => $code,'filters' => $filters]);
    }
}