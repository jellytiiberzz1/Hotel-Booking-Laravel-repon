<?php

namespace App\Http\Controllers;

use App\Bookings;
use App\Category;
use App\Contacts;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use File;
use Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::paginate(10);
        $contact = Contacts::all();
        $booking = Bookings::where('status', 1)->get();
        return view('admin.pages.category.list', compact("category", 'contact', 'booking'));
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
        return view('admin.pages.category.create-category', compact('contact', 'booking'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->image;
            //Lấy tên file
            $file_name = $file->getClientOriginalName();
            //Lấy loại file
            $file_type = $file->getMimeType();
            //Kích thước file với đơn vị byte
            $file_size = $file->getSize();
            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif') {
                if ($file_size <= 2048576) {
                    $file_name = date('D-m-yyyy') . '-' . rand() . '-' . utf8tourl($file_name);
                    if ($file->move('img/upload/category', $file_name)) {
                        $data = $request->all();
                        $data['slug'] = utf8tourl($request->name);
                        $data['image'] = $file_name;
                        Category::create($data);
                        return redirect()->route('category.index')->with('thongbao', 'Đã thêm thành công sản phẩm mới');
                    }
                } else {
                    return back()->with('error', 'Bạn không thể upload ảnh quá 1mb');
                }
            } else {
                return back()->with('error', 'File bạn chọn không là hình ảnh');
            }
        } else {
            return back()->with('error', 'Bạn chưa thêm ảnh minh họa cho sản phẩm');
        }

//
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json(['category' => $category], 200);
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
                'price' => 'required|numeric',
                'usd' => 'required|numeric',
                'description' => 'min:10',
                'image' => 'image',
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'min' => ':attribute tối thiểu có 2 ký tự',
                'max' => ':attribute tối đa có 255 ký tự',
                'numeric' => ':attribute phải là một số ',
                'image' => ':attribute không là hình ảnh',
            ],
            [
                'name' => 'Tên loại phòng',
                'price' => 'Giá phòng',
                'usd' => 'Giá ngoại tệ',
                'description' => 'Mô tả phòng',
                'image' => 'Ảnh minh họa',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => 'true', 'message' => $validator->errors()], 200);
        }
        $cate = Category::find($id);
        $data = $request->all();
        $data['slug'] = utf8tourl($request->name);
        if ($request->hasFile('image')) {
            $file = $request->image;
            //Lấy tên file
            $file_name = $file->getClientOriginalName();
            //Lấy loại file
            $file_type = $file->getMimeType();
            //Kích thước file với đơn vị byte
            $file_size = $file->getSize();
            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif') {
                if ($file_size <= 2048576) {
                    $file_name = date('d-mm-YYYY') . '-' . rand() . '-' . utf8tourl($file_name);
                    if ($file->move('img/upload/category', $file_name)) {
                        $data['image'] = $file_name;
                        if (File::exists('img/upload/category' . $cate->image)) {
                            //Xóa file
                            unlink('img/upload/category' . $cate->image);
                        }
                    }
                } else {
                    return response()->json(['error', 'Dung lượng file quá lớn'], 200);
                }
            } else {
                return response()->json(['error', 'File bạn chọn không phải hình ảnh'], 200);
            }
        } else {
            $data['image'] = $cate->image;
        }
        $cate->update($data);
        return response()->json(['result' => 'Đã sửa thành công phòng có id là ' . $id], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json(['success' => 'Xóa thành công']);
    }
}
