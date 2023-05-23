<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Item; 
use App\Models\Userorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
 
     public function myorder()
    {   
        $userorders = Userorder::where('user_id', Auth()->user()->id)->get();
        $userorderscount = DB::table('userorders')->where('user_id', Auth()->user()->id)->count();
                
         $item = Item::all();
         return view('fontend.user.order', compact('userorders','item','userorderscount'));   
    }

}
