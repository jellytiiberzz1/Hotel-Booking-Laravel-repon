<?php

namespace App\Http\Controllers;

use App\Bookings;
use App\Contacts;
use App\Http\Requests\StoreRoomsRequest;
use App\Rooms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Category;
use App\Kind_Rooms;
use File;
use Validator;


class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Rooms::paginate(5);
        $contact = Contacts::all();
        $booking = Bookings::where('status', 1)->get();
        return view('admin.pages.rooms.list', compact('rooms', 'contact', 'booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status', 1)->get();
        $kindrooms = Kind_Rooms::where('status', 1)->get();
        $contact = Contacts::all();
        $booking = Bookings::where('status', 1)->get();
        return view('admin.pages.rooms.create', compact('category', 'kindrooms', 'contact', 'booking'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreRoomsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomsRequest $request)
    {
        $data = $request->all();
        $data['slug'] = utf8tourl($request->number_room);
        Rooms::create($data);
        return redirect()->route('rooms.index')->with('thongbao', 'Đã thêm thành công phòng mới');

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
        $category = Category::where('status', 1)->get();
        $kindrooms = Kind_Rooms::where('status', 1)->get();
        $rooms = Rooms::find($id);
        return response()->json(['category' => $category, 'kindrooms' => $kindrooms, 'room' => $rooms], 200);
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
        $rooms = Rooms::find($id);
        $data = $request->all();
        $data['slug'] = utf8tourl($request->name);
         if ($request->date_from == null){
            $data['date_from'] = Carbon::today()->toDateString();
            $data['date_to'] = Carbon::today()->toDateString();
        }
        $rooms->update($data);
        return response()->json(['result' => 'Đã sửa thành công phòng có id là ' . $id], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $rooms = Rooms::find($id);
        $rooms->delete();
        return response()->json(['result' => 'Đã xóa thành công phòng có id là ' . $id], 200);
    }

}
