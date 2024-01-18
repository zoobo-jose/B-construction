<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Article;

class Panier extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_id',
        'user_id',
        'created_at',
        'updated_at',
    ];
    protected $attributes = [
        'sold' => false,
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}   
