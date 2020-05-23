<?php

namespace App\Http\Controllers;

use App\Bookings;
use App\Contacts;
use Illuminate\Http\Request;
use Mail;
use App\Mail\BookingHotelMail;


class ReservationmanagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Bookings::where('status',1)->paginate(10);
        $contact = Contacts::all();
        return view('admin.pages.Booking.booking', compact('booking','contact'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Bookings::find($id);
        return response()->json($booking, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $booking= Bookings::find($id);
        $booking->update(
            [
                'status' => $request->status
            ]
        );
//        Mail::to($booking->email)->send(new BookingHotelMail($booking));
        return response()->json(['success' => 'Sửa thành công '.$booking->code_order],200);


    }



    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Bookings::find($id);
        if ($booking->delete()) {
            return response()->json(['success' => 'Đã xóa thành công phòng đặt có id ' . $id], 200);
        } else {
            return response()->json(['success' => 'Đã xóa không thành công phòng đặt có id ' . $id], 200);
        }
    }
}
