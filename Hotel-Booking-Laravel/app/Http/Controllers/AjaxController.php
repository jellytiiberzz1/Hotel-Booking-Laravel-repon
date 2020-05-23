<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kind_Rooms;
use App\Category;

class AjaxController extends Controller
{
    public function getKindRooms(Request $request){
        $kindrooms = Kind_Rooms::where('idCategory',$request->idCate)->get();
        return response()->json($kindrooms,200);
    }
}
