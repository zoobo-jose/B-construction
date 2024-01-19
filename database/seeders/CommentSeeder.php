<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=array();
        for($i=1;$i<=10;$i++){
                 array_push( $data, [ 
                    "user_name"=>get_random_user_name(),
                    "user_email"=>"ericjosezoobo@gmail",
                    "user_rate"=>rand(0,5),
                    "article_id"=>rand(2,10),
                    "content"=>"
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque",
                    "created_at"=>date('Y-m-d H:i:s'),
                ]);
        }
        DB::table('comments')->insert($data);
    }
}
