<?php

namespace App\Charts;

use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Highcharts\Chart;

class Revenue extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public static function getListDay()
    {
        $arrayDay =[];
        $month = date('m');
        $year = date('y');
//        $cardon = Carbon::now()->format('m');


        for ($day = 1; $day <= 31; $day++) {
            $time = mktime(12, 0, 0, $month, $day, $year);
            if (date('m', $time == $month))
                $arrayDay[] = date('Y-m-d', $time);
        }

        return $arrayDay;
    }
    public static function getListMonth()
    {
        $arrayMonth = [];

        for($month = 1; $month <= 12; $month++)
        {
            $time = mktime(0, 0, 0, $month);

                $arrayMonth[] = date('m', $time);
        }
       return $arrayMonth;
    }
}
