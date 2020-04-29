<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Bookings;
use App\Customer;
use App\Http\Requests\BookingRequest;
use App\Kind_Rooms;
use App\Mail\BookingHotelMail;
use App\Rooms;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $value = $request->session()->get('id');
        $room = Rooms::where('id',$value)->first();
        $booking = Bookings::where('idRoom',$value)->first();
        return view('client.pages.confirmation', compact('room', 'booking'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        $data = $request->except('_token');
        Bookings::create($data);
        $customer = $request->except(['_token', 'idRoom', 'amount','code_order', 'date_from', 'date_to', 'additional_information']);
        Customer::create($customer);
//        Mail::to($booking->email)->send(new BookingHotelMail($booking));

//        return back()->with('thongbao', 'Đã đặt phòng thành công');
        return redirect()->route('payment');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Bookings $bookings
     * @return \Illuminate\Http\Response
     */
    public function show(Bookings $bookings)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Bookings $bookings
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookings $bookings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Bookings $bookings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bookings $bookings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Bookings $bookings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookings $bookings)
    {

    }

    public function detail(Request $request)
    {

    }

    public function addBook(Request $request, $id)
    {
        $room = Rooms::where('id', $id)->first();
        $request->session()->put('id', $id);
        return view('client.pages.inforbook', compact('room'));

    }
}
