<?php
 
namespace App\Providers;

use App\Http\View\Composers\CartComposer;
use App\Http\View\Composers\MenuComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
 
class ViewServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        
    }
 
   
    public function boot()
    {
       view()->composer('header', MenuComposer::class);
       view()->composer('cart', CartComposer::class);
    }
}