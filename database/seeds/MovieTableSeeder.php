<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->delete();

        DB::table('movies')->insert([
            'id' => 1,
            'name' => 'Avengers: Infinity War',
            'from_date' => '2018-09-08',
            'to_date' => '2018-09-15',
            'price' => '150',
            'image_url' => 'storage/uploads/movie/Avengers_Infinity_War_poster.jpg',
            'status' => 1
        ]);
    }

}
