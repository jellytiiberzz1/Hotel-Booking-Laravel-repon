<?php

namespace App\Http\Controllers;

use App\Bookings;
use App\Contacts;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
   public function index(){
       $contact = Contacts::all();
       $booking = Bookings::where('status', 1)->get();
       return view('admin.pages.404.404', compact('contact', 'booking'));
   }
}
