@extends('admin.layouts.master')

@section('title')
    Có gì đó sai!
@endsection

@section('content')
    <div class="container-fluid">

        <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            <p class="text-gray-500 mb-0">Có vẻ như bạn đã gặp một trục trặc trong hệ thống ...</p>
            <a href="{{'/admin'}}">&larr; Quay lại trang chủ</a>
        </div>

    </div>
@endsection
