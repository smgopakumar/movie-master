<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SeatMasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seat_masers')->delete();

//********* Second Row *********************

        DB::table('seat_masers')->insert([
            'id' => 1,
            'name' => 'A1',
            'row_number' => 1,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 2,
            'name' => 'A2',
            'row_number' => 1,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 3,
            'name' => 'A3',
            'row_number' => 1,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 4,
            'name' => 'A4',
            'row_number' => 1,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 5,
            'name' => 'A5',
            'row_number' => 1,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 6,
            'name' => 'A6',
            'row_number' => 1,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 7,
            'name' => 'A7',
            'row_number' => 1,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 8,
            'name' => 'A8',
            'row_number' => 1,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 9,
            'name' => 'A9',
            'row_number' => 1,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 10,
            'name' => 'A10',
            'row_number' => 1,
        ]);

//********* Second Row *********************

        DB::table('seat_masers')->insert([
            'id' => 11,
            'name' => 'B1',
            'row_number' => 2,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 12,
            'name' => 'B2',
            'row_number' => 2,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 13,
            'name' => 'B3',
            'row_number' => 2,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 14,
            'name' => 'B4',
            'row_number' => 2,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 15,
            'name' => 'B5',
            'row_number' => 2,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 16,
            'name' => 'B6',
            'row_number' => 2,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 17,
            'name' => 'B7',
            'row_number' => 2,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 18,
            'name' => 'B8',
            'row_number' => 2,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 19,
            'name' => 'B9',
            'row_number' => 2,
        ]);
        DB::table('seat_masers')->insert([
            'id' => 20,
            'name' => 'B10',
            'row_number' => 2,
        ]);


    }
}
