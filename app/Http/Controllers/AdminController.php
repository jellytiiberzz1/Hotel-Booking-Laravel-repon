<?php

namespace App\Http\Controllers;
use DB;
use App\Bookings;
use App\Customer;
use App\Rooms;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect('admin');
    }

    public function index()
    {
        $user = User::where('role', 1)->get()->count();
        $customer = Customer::where('status', 1)->get()->count();
        $customer2 = Customer::all();
        $room = Rooms::where('status', 0)->get()->count();
        $room2 = Rooms::where('status', 1)->get()->count();
        $room3 = Rooms::all();
        $booking = Bookings::all();
        $amount = Bookings::all()->sum('amount');
//        $amount1 = Bookings::where('date_to',)
        return view('admin.pages.index', [
            'user' => $user,
            'customer' => $customer,
            'room' => $room,
            'room2' => $room2,
            'customer2' => $customer2->count(),
            'room3' => $room3->count(),
            'booking' => $booking,
            'amount'=>$amount,
        ]);

    }
}
