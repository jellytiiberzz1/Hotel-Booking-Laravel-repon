<?php

namespace App\Http\Controllers;

use App\Bookings;
use App\Contacts;
use App\ServiceSlug;
use Illuminate\Http\Request;
use App\Http\Requests\StoreServiecSlug;
use Validator;

class ServiceSlugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceSlug = ServiceSlug::paginate(10);
        $contact = Contacts::all();
        $booking = Bookings::where('status', 1)->get();
        return view('admin.pages.serviceSlug.list', compact("serviceSlug",'contact','booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact = Contacts::all();
        $booking = Bookings::where('status', 1)->get();
        return view('admin.pages.serviceSlug.create', compact('contact','booking'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiecSlug $request)
    {
        ServiceSlug::create([
            'name' => $request->name,
            'slug' => utf8tourl($request->name),
            'status' => $request->status,

        ]);
        return redirect()->route('serviceslug.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceSlug  $serviceSlug
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceSlug $serviceSlug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviecSlug = ServiceSlug::find($id);
        return response()->json($serviecSlug, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:2|max:255'
            ],
            [
                'required' => 'Tên danh mục sản phẩm không được để trống',
                'min' => 'Tên danh mục sản phẩm phải đủ từ 2-255 ký tự',
                'max' => 'Tên danh mục sản phẩm phải đủ từ 2-255 ký tự',
            ]
        );
        if($validator->fails()){
            return response()->json(['error' =>'true','message' => $validator->errors()],200);
        }
        $serviceSlug= ServiceSlug::find($id);
        $serviceSlug->update(
            [
                'name' => $request->name,
                'slug' => utf8tourl($request->name),
                'status' => $request->status
            ]
        );
        return response()->json(['success' => 'Sửa thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serviceSlug = ServiceSlug::find($id);
        $serviceSlug->delete();
        return response()->json(['success' => 'Xóa thành công']);
    }
}
