<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categoris')->insert(
            [
           [ 'name'=>"categori 1",
           'description'=>"description de la categorie 1"],
           [ 'name'=>"categori 2",
           'description'=>"description de la categorie 2"],
           [ 'name'=>"categori 3",
           'description'=>"description de la categorie 3"],
           ]
        );
 
    }
}
