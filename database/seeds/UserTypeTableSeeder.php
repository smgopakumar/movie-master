<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->delete();

        DB::table('user_types')->insert([
            'id' => 1,
            'name' => 'Admin',
            'status' => 1
        ]);

        DB::table('user_types')->insert([
            'id' => 2,
            'name' => 'Public User',
            'status' => 1
        ]);

    }
}
