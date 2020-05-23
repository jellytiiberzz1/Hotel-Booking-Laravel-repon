<?php

namespace App\Http\Controllers;

use App\Bookings;
use App\Contacts;
use App\Customer;
use App\Http\Requests\CustomerRequest;
use App\User;
use Illuminate\Http\Request;
use Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::where('status',1)->paginate(10);
        $contact = Contacts::all();
        $booking = Bookings::where('status', 1)->get();
        return view('admin.pages.user.customer', compact('customer','contact','booking'));
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
    public function store(CustomerRequest $request)
    {
        if($request->ajax()){
            $data = $request->only('email', 'phone', 'address');
            $data['idUser'] = Auth::user()->id;
            Customer::create($data);
            return response()->json('Đã thêm thông tin thành công',200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return response()->json(['success' => 'Xóa thành công']);
    }


}
