<?php

namespace App\Http\Controllers;

use App\Rooms;
use App\Service;
use App\ServiceSlug;
use Illuminate\Http\Request;
use App\Http\Requests\StoreServiec;
use Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::paginate(5);
        return view('admin.pages.service.list', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Rooms::where('status', 0)->get();
        $serviecSlug = ServiceSlug::where('status', 1)->get();
        return view('admin.pages.service.create', compact('rooms', 'serviecSlug'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiec $request)
    {
        $data = $request->all();
        Service::create([
            'idRoom' => $request->idRoom,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'idServiceslug' => $request->idServiceslug,
            'note' => $request->note,
            'created_at' => $request->created_at,
        ]);
        if (Service::create($data)) {
            return redirect()->route('service.index')->with('thongbao', 'Đã thêm thành công');
        } else {
            return back()->with('thongbao', 'Đã có lỗi xảy ra xin kiểm tra lại');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Service $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
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
        $rooms = Rooms::where('status', 1)->get();
        $serviecSlug = ServiceSlug::where('status', 1)->get();
        $service = Service::find($id);
        return response()->json(['rooms' => $rooms, 'serviecSlug' => $serviecSlug, 'service' => $service], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $i
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'quantity' => 'required|numeric',
                'price' => 'required|numeric',
                'created_at' => 'required|date|after:tomorrow',
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'numeric' => ':attribute phải là một số ',
                'after' => ':attribute vào phải lớn hơn hoặc bằng ngày hiện tại',
            ],
            [
                'price' => 'Giá dịch vụ',
                'quantity' => 'Số lượng',
                'created_at' => 'Ngày vào',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => 'true', 'message' => $validator->errors()], 200);
        }
        $service = Service::find($id);
        $data = $request->all();
        $service->update($data);
        if ($service->update($data)) {
            return response()->json(['result' => 'Đã sửa thành công dịch vụ có id ' . $id], 200);
        } else {
            return response()->json(['result' => 'Đã sửa không thành công dịch vụ có id ' . $id], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        if ($service->delete()) {
            return response()->json(['result' => 'Đã xóa thành công loại dịch vụ có id ' . $id], 200);
        } else {
            return response()->json(['result' => 'Đã xóa không thành công dịch vụ có id ' . $id], 200);
        }
    }
}
