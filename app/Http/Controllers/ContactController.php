<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\slider;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;


class ContactController extends Controller
{
   public function contuct(){
        $sliders = Slider::all();
        $categorys = Category::all();
         $items = Item::all();
         return view('welcome', compact('sliders', 'categorys','items'));
 
   }

public function sendEmail(Request $request)
{
    $details = [
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message
    ];

    Mail::to('sharif.uddin.9977@gmail.com')->send(new ContactMail($details));
    return back()->with('message-sent','Your message has been sent');
}


}
