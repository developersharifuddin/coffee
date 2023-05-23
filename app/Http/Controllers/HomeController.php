<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item; 
use App\Models\Slider;
use App\Models\Category;
use Illuminate\Cache\RateLimiting\Limit;

class HomeController extends Controller
{

 
    public function index()
    {
        $sliders = Slider::all();
        $categorys = Category::all();
        $items = Item::all();

        //$item = Item::where('category_id', Category::category()->id)->get();
        
         return view('fontend.index', compact('sliders', 'categorys','items'));
    }
    public function contact()
    {
         return view('fontend.contact');
    }
    public function reservation()
    {
        return view('fontend.reservation');
    }
    public function about()
    {
         return view('fontend.about');
    }
    public function blog()
    {
         return view('fontend.blog');
    }
    public function blogsingle()
    {
         return view('fontend.blogsingle');
    }

 
    public function menu()
    {
          //$products = DB::table('items')->where('category_id', $category->id)->orderBy('created_at','DESC')->get()->take(1);
		 $products = Item::orderBy('created_at','DESC')->get()->take(8);
         //$categories = Category::whereIn('id',$cats)->get();
         //$category = Category::find(1);
        // $cats = explode(',', $category->id);
         $categories = Category::all();
         //$no_of_products = $category->id;
 
         return view('fontend.menu', compact('categories'));
 
    }
    public function services()
    {
        $carts = Cart::all();
        $items = Item::all();
        return view('fontend.services', compact('carts','items'));
    }
    public function shop()
    {
          $products = Item::orderBy('created_at','DESC')->get()->take(8);
         $categories = Category::all();
         return view('fontend.shop', compact('categories'));
 
    }

    public function productsingle()
    {
        $sliders = Slider::all();
        $categorys = Category::all();
        $items = Item::all();
        return view('fontend.product-single', compact('sliders', 'categorys','items'));
      
    }


  
}
