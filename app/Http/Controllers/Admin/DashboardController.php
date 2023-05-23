<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Models\slider;
use App\Models\reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Userorder;
use Illuminate\Foundation\Auth\User;

class DashboardController extends Controller
{
     public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        $user = User::count();
        $sliders = Slider::all();
        $countSlider = slider::count();
        $item = Item::count(); 
        $reservation = reservation::count();
        $userOrder = Userorder::count();
        $reservationpending = Reservation::where('delivered', false)->count();
        $reservationconfirmed = Reservation::where('delivered', true)->count();
        return view('admin.dashboard', compact('sliders', 'countSlider', 'user','item',  'reservation', 'reservationpending', 'reservationconfirmed','userOrder'));

    }
}
