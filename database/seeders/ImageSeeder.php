<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=array();
        for($article_id=2;$article_id<=10;$article_id++){
            for($i=1;$i<=10;$i++){
                 array_push( $data, [ 
                'description'=>"description de l'image ".$i,
                "url"=>"/img/article/img".$i.".jpg",
                "article_id"=>$article_id
                ]);
            }
         }
        DB::table('images')->insert($data);
    }
}
