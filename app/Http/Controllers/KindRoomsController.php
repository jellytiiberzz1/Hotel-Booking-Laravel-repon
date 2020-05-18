<?php

namespace App\Http\Controllers;

use App\Bookings;
use App\Category;
use App\Contacts;
use App\Kind_Rooms;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKindRoomsRequest;
use Validator;

class KindRoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kindrooms = Kind_Rooms::paginate(10);
        $contact = Contacts::all();
        $booking = Bookings::where('status', 1)->get();
        return view('admin.pages.kindrooms.list', compact('kindrooms','contact','booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status', 1)->get();
        $contact = Contacts::all();
        $booking = Bookings::where('status', 1)->get();
        return view('admin.pages.kindrooms.create', compact('category','contact','booking'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKindRoomsRequest $request)
    {
        $data = $request->all();
        $data ['slug'] = utf8tourl($request->name);
        if (Kind_Rooms::create($data)) {
            return redirect()->route('kindrooms.index')->with('thongbao', 'Đã thêm thành công');
        } else {
            return back()->with('thongbao', 'Đã có lỗi xảy ra xin kiểm tra lại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kindrooms = Kind_Rooms::find($id);
        $category = Category::where('status', 1)->get();
        return response()->json(['category' => $category, 'kindrooms' => $kindrooms], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:2|max:255',
            ],
            [
                'name.required' => 'Tên phòng không được để trống',
                'name.min' => 'Tên phòng ít nhất phải 2 ký tự',
                'name.max' => 'Tên phòng tối đa 255 ký tự',
            ]
        );
        if($validator->fails()){
            return response()->json(['error' =>'true','message' => $validator->errors()],200);
        }
        $kindrooms = Kind_Rooms::find($id);
        $data = $request->all();
        $data['slug'] = utf8tourl($request->name);
        if($kindrooms->update($data)){
            return response()->json(['result' => 'Đã sửa thành công phòng có id '.$id],200);
        }else{
            return response()->json(['result' => 'Đã sửa không thành công phòng có id '.$id],200);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kindrooms = Kind_Rooms::find($id);
        if($kindrooms->delete()){
            return response()->json(['result' => 'Đã xóa thành công loại kiểu phòng có id '.$id],200);
        }else{
            return response()->json(['result' => 'Đã xóa không thành công loại kiểu phòng có id '.$id],200);
        }
    }
}
