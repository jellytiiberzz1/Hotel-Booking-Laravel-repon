<?php

namespace App\Http\Controllers;

use App\Bookings;
use App\Charts\Revenue;
use App\Contacts;
use Auth;

class RevenueController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->can('view', Bookings::class)) {
            $contact = Contacts::all();
            $booking = Bookings::where('status', 1)->get();
            $listDay = Revenue::getListDay();
            $revenueMonth = Bookings::where('status', 0)
                ->whereMonth('created_at', date('m'))
                ->select(\DB::raw('sum(amount) as totalMoney'), \DB::raw('DATE(created_at)day'))
                ->groupBy('day')
                ->get()->toArray();
            $arrRevenueMonth = [];

            foreach ($listDay as $day) {
                $total = 0;
                foreach ($revenueMonth as $key => $revenue) {
                    if ($revenue['day'] == $day) {
                        $total = $revenue['totalMoney'];
                        break;
                    }
                }
                $arrRevenueMonth[] = $total;

            }
            $day = date('m');
            $chart = new Revenue;
            $chart->labels($listDay);
            $chart->dataset('Biểu đồ doanh thu các ngày trong tháng thành toán ONLINE ' . $day, 'line', $arrRevenueMonth);
            $listMonth = Revenue::getListMonth();
            $revenueYear = Bookings::where('status', 0)
                ->whereYear('created_at', date('Y'))
                ->select(\DB::raw('sum(amount) as totalMoney'), \DB::raw('month(created_at)month'))
                ->groupBy('month')
                ->get()->toArray();
            $arrRevenueYear = [];
            foreach ($listMonth as $month) {
                $total = 0;
                foreach ($revenueYear as $key => $revenue) {
                    if ($revenue['month'] == $month) {
                        $total = $revenue['totalMoney'];
                        break;
                    }
                }
                $arrRevenueYear[] = $total;
            }


            $amount = Bookings::whereMonth('created_at',date('m'))
                ->sum('amount');
            $chartBar = new Revenue;
            $chartBar->labels($listMonth);

            $chartBar->dataset('Doanh thu theo tháng (USD)', 'column', $arrRevenueYear)->options([
                'color' => '#90677b']);
            return view('admin.pages.revenue.revenue', ['chart' => $chart, 'chartbar' => $chartBar, 'contact' => $contact, 'booking' => $booking, 'amount' => $amount]);
        } else

            return redirect('admin/error');

    }
}
