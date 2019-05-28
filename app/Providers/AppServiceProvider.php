<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Order;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if(Order::where('from',date('Y-m-d'))->count() == 0) {

      } else {
        foreach ($orders = Order::where('from',date('Y-m-d'))->get()  as $order) {
          $order->rooms->is = 0;
          $order->rooms->save();
        }
      }
      if(Order::where('from','<',date('Y-m-d'))
      ->where('to','>',date('Y-m-d'))
      ->count() == 0) {

      } else  {
        foreach ($orders = Order::where('from','<',date('Y-m-d'))
        ->where('to','>',date('Y-m-d'))
        ->get() as $order) {
          $order->rooms->is = 0;
          $order->rooms->save();
        }
      }
        if(Order::where('to',date('Y-m-d'))->count() == 0) {

        } else {
          foreach ($orders = Order::where('to',date('Y-m-d'))->get() as $order) {
            $order->rooms->is = 1;
            $order->rooms->save();
            $order->delete();
          }
        }
        if(Order::where('to','<',date('Y-m-d'))->count() == 0) {

        } else {
          foreach ($orders = Order::where('from','<',date('Y-m-d'))->get() as $order) {
            $order->rooms->is = 1;
            $order->rooms->save();
            $order->delete();
          }
        }
        if(Order::where('from','>',date('Y-m-d'))->count() == 0) {

        } else {
          foreach ($orders = Order::where('from','>',date('Y-m-d'))->get() as $order) {
            if($order->rooms->is != 1) {
              $order->rooms->is = 1;
              $order->rooms->save();
            }
          }
        }
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
