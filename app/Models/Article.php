<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Pdf;
use App\Models\Categori;

class Article extends Model
{
    use HasFactory;

    public function images()
   {
       return $this->hasMany(Image::class);
   }

   public function image()
   {
       return $this->hasOne(Image::class);
   }

   public function pdfs()
   {
       return $this->hasMany(Pdf::class);
   }
   public function categori()
   {
       return $this->belongsTo(Categori::class);
   }
   

}
