<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\Bookings;
use App\Customer;
use App\Rooms;
use App\User;
use App\Charts\Revenue;
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
        $user = User::where('role','=', 2)->get()->count();
        $customer = Customer::where('status', 1)->get()->count();
        $customer2 = Customer::all();
        $room = Rooms::where('status', 0)->get()->count();
        $room2 = Rooms::where('status', 1)->get()->count();
        $room3 = Rooms::all();
        $contact = Contacts::all();
        $booking = Bookings::where('status', 1)->get();
        $booking2 = Rooms::where('status', 2)->get()->count();

//        $amount1 = Bookings::where('date_to',)
        return view('admin.pages.index', [
            'user' => $user,
            'customer' => $customer,
            'room' => $room,
            'contact' => $contact,
            'room2' => $room2,
            'customer2' => $customer2->count(),
            'room3' => $room3->count(),
            'booking' => $booking,
            'booking2' => $booking2,
        ]);

    }
}
