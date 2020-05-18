<?php

namespace App\Http\Controllers;


use App\Bookings;
use App\Category;
use App\Customer;
use App\Http\Requests\BookingRequest;
use Illuminate\Http\Request;


class BookingsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $value = $request->session()->get('slug');
        $cate = Category::where('slug',$value)->first();
        $booking = Bookings::where('idCategory',$cate->id)->first();
        return view('client.pages.confirmation', compact('cate', 'booking'));
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
    public function store(BookingRequest $request )
    {
        $data = $request->except('_token');
        Bookings::create($data);
        $customer = $request->except(['_token', 'idCategory', 'amount','code_order', 'date_from', 'date_to', 'additional_information']);
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

    public function addBook(Request $request,$slug)
    {
        $cate = Category::where('slug', $slug)->first();
        $request->session()->put('slug', $slug);
        return view('client.pages.inforbook', compact('cate'));

    }
}
