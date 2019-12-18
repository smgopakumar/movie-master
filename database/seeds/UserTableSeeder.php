<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'user_type_id' => 1,
            'email' => 'admin@movie.com',
            'password' => Hash::make('123456'),
            'status' => 1
        ]);
    }
}
