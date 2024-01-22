<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PdfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=array();
        for($article_id=1;$article_id<=10;$article_id++){
            for($i=1;$i<=2;$i++){
                 array_push( $data, [ 
                'description'=>"description du pdf ".$i,
                "url"=>"/pdf/pdf".$i.".pdf",
                "article_id"=>$article_id
                ]);
            }
         }
        DB::table('pdfs')->insert($data);
    }
}
