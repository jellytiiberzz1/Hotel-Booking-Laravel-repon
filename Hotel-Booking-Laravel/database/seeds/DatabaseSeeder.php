<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <=10; $i++){
            DB::table('users')->insert([
                'name' => 'Người dùng'.$i,
                'email' => 'email'.$i.'@gmail.com',
                'password' => Hash::make('admin'),
                'phone' => '0905' .rand(000001,999999),
                'role' => '1',
            ]);
        }
    }
}
