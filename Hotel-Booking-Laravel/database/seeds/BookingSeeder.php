<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <=6; $i++){
            DB::table('bookings')->insert([
                'idUser' => '29',
                'idCategory' => '3',
                'name' => 'Nguyễn Văn '.$i,
                'amount' =>'65',
                'status' => '0',
                'code_order' => rand(),
                'email' => 'jellytiiber@gmail.com',
                'address' => 'TP.Đà Nẵng',
                'CMND' => 987654321,
                'phone' => '0905' .rand(000001,999999),
                'date_from' =>Carbon::now(),
                'date_to' => Carbon::now(),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
    }
}
