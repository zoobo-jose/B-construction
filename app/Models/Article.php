<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Pdf;
use App\Models\Categori;
use App\Models\Comment;
use App\Models\Panier;

class Article extends Model
{
    public $timestamps = true;
    
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
   public function comments()
   {
       return $this->hasMany(Comment::class);
   }
   public function ventes()
   {
       return $this->hasMany(Panier::class)->where('sold',true);
   }

}
