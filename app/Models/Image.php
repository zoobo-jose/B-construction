<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $fillable = [
        'article_id',
        'created_at',
        'updated_at',
        'description',
        'url'
    ];
}
