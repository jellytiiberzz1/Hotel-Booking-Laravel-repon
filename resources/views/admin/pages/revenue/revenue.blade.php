@extends('admin.layouts.master')

@section('title')
    Doanh thu tháng
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Doanh thu</h6>
        </div>
    </div>
    <div class="app">
        <b>Tổng doanh thu trong tháng: {{number_format($amount*23000,2)}}&nbspVND</b>
    {!! $chart->container() !!}

    </div>
    {!! $chartbar->container() !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
    {!! $chart->script() !!}
    {!! $chartbar->script() !!}
@endsection

