<?php

namespace App\Http\Controllers;
use App\Category;
use App\Kind_Rooms;
use App\Rooms;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $category = Category::where('status',1)->get();
        $kindrooms = Kind_Rooms::where('status',1)->get();
        view()->share(['category' => $category,'kindrooms' => $kindrooms]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


}
