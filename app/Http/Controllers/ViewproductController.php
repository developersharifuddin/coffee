<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;

class ViewproductController extends Controller
{
    public function viewproduct($id)
    {
         $carts = Cart::all();
         $items  = Item::all();
         $viewproduct  = Item::find($id);
         $price  = $viewproduct->price + 1;
         return view('fontend.product-single', compact('viewproduct','carts','items','price'));

    }
}
