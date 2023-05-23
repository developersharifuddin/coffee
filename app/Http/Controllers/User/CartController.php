<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Usercart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        if(Auth()->user()){
            $carts= Cart::where('user_id', Auth()->user()->id)->orderBy('created_at','DESC')->get();
            $items = Item::all();
            return view('fontend.user.carts', compact('carts','items'));
        }else{
            return redirect()->route('user.login');
            }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'item_id' => 'required',
            'quantity' => 'required',
            'total' => 'required',
            'price' => 'required'
             
        ]);
         
        $cart = new Cart();
        $cart->item_id = $request->item_id;
        $cart->user_id = Auth::user()->id;
        $cart->quantity = $request->quantity;
        $cart->total = $request->total;
        $cart->price = $request->price * $request->quantity; 
        $cart->status = false;
        $cart->save();

        $carts= Cart::where('user_id', Auth()->user()->id)->orderBy('created_at','DESC')->get();
        $item = Item::all();
        return redirect()->route('fontend.cart', compact('carts','item'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // carts/ single cart view to cart.blade.php page
    public function show($id)
    {
        
        $carts= Cart::where('user_id', Auth()->user()->id)->get();
        $cart = Cart::find($id);
        return view('fontend.user.cart', compact('cart','carts'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        $carts= Cart::where('user_id', Auth()->user()->id)->get();
        $cart = Cart::find($id);
        return view('fontend.checkout', compact('cart','carts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carts= Cart::where('user_id', Auth()->user()->id)->get();
        $cart = Cart::find($id);  
        $cart->quantity = $request->quantity; 
        $cart->price = $request->price * $request->quantity; 
        $cart->status = false;
        $cart->update();
        return view('fontend.checkout', compact('cart','carts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $carts = Cart::find($id);
        $carts->delete();
       return redirect()->route('fontend.cart', compact('carts'));
    }
}
