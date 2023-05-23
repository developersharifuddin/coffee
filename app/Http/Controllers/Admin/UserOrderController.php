<?php

namespace App\Http\Controllers\Admin;
 
use App\Models\Userorder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderConfirmed;
use Brian2694\Toastr\Facades\Toastr; 
use Illuminate\Support\Facades\Notification;

class UserOrderController extends Controller
{
    public function index()
    {
        $orders = Userorder::all();
        return view('admin.order.index', compact('orders'));
    }


    public function store(Request $request)
    {
         $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'country' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'line1' => 'required',
            'item_id' => 'required',
            'subtotal' => 'required',
            'quantity' => 'required',
            'discount' => 'required',
            'tax' => 'required',
            'total' => 'required',
            'optradio' => 'required'
             
        ]);
  
        $item = new Userorder();
        $item->user_id = Auth::user()->id;
        $item->firstname= $request->firstname;
        $item->lastname= $request->lastname;
        $item->country= $request->country;
        $item->city= $request->city;
        $item->postcode= $request->postcode;
        $item->email= $request->email;
        $item->phone= $request->phone;
        $item->line1= $request->line1;
        $item->line2 = $request->line-2;
        $item->item_id= $request->item_id;
        $item->subtotal= $request->subtotal;
        $item->quantity= $request->quantity;
        $item->discount= $request->discount;
        $item->tax= $request->tax;
        $item->total= $request->total;
        $item->payment_method= $request->optradio;
        $item->status = false;
          
        $item->save();
        Toastr::success('Your Orders Submit Successfully', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('fontend.staying');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'status' => 'required' 
             
        ]);

         $order = Userorder::find($id);
         $order->status = $request->status;
          
         $order->save();
         Notification::route('mail', $order->email)->notify(new OrderConfirmed);
         Toastr::success('order confirmed Successfully', 'success', ["positionClass" => "toast-top-right"]);
         return redirect()->back();
    }

    public function cancelOrder(Request $request, $id)
    {
        $this->validate($request,[
            'status' => 'required' 
             
        ]);

         $order = Userorder::find($id);
         $order->status = $request->status;
          
         $order->save();
         Notification::route('mail', $order->email)->notify(new OrderConfirmed);
         Toastr::success('order cancel Successfull.', 'success', ["positionClass" => "toast-top-right"]);
         return redirect()->back();
    }

    public function destroy($id)
    {
        $order = Userorder::find($id);
        $order->delete();
        return redirect()->route('order.index');

    }
     
}
