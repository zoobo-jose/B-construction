<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArclicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=array();
        for($i=1;$i<=10;$i++){
                 array_push( $data, [ 
                'description'=>"description de l'article ".$i,
                "name"=>"article".$i."",
                "prix"=>5000,
                "categori_id"=>rand(1,2)
                ]);
        }
        DB::table('articles')->insert($data);
    }
}
