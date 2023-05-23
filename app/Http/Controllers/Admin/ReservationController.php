<?php

namespace App\Http\Controllers\Admin;

use App\Models\reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Notifications\ReservationCancel;
use App\Notifications\ReservationConfirmed;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
         return view('admin.reservation.index', compact('reservations'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $reservation = Reservation::find($id);
        $reservation->delivered =  $request->delivered;
        $reservation->save();
        Notification::route('mail', $reservation->email)->notify(new ReservationConfirmed);
        Notification::route('mail', $reservation->email)->notify(new ReservationCancel);
        Toastr::success('Researvation Submit Successfully', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservations = Reservation::find($id);
        $reservations->delete();
        return redirect()->route('reservation.index');
    }
}

 