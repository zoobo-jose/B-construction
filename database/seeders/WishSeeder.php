<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=array();
        for($i=1;$i<=10;$i++){
                 array_push( $data, [ 
                    "user_id"=>rand(1,3),
                    "article_id"=>rand(2,10),
                ]);
        }
        DB::table('wishs')->insert($data);
    }
}
