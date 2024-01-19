<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_id',
        'user_name',
        'user_email',
        'user_rate',
        'created_at',
        'updated_at',
        'content'
    ];
}
