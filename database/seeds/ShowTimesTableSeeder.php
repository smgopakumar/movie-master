<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ShowTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('show_times')->delete();

        DB::table('show_times')->insert([
            'id' => 1,
            'display_show_time' => '9 AM',
            'show_time' => '09:00:00',
            'status' => 1
        ]);

        DB::table('show_times')->insert([
            'id' => 2,
            'display_show_time' => '11.30 AM',
            'show_time' => '11:30:00' ,
            'status' => 1
        ]);

        DB::table('show_times')->insert([
            'id' => 3,
            'display_show_time' => '2.30 PM',
            'show_time' => '14:30:00',
            'status' => 1
        ]);

        DB::table('show_times')->insert([
            'id' => 4,
            'display_show_time' => '5 PM',
            'show_time' => '17:00:00' ,
            'status' => 1
        ]);

    }
}
