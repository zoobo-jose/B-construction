<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Article;
use App\Models\Panier;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'surname',
        'surname',
        'payment_mode',
        'mobile',
        'pays',
        'etat',
        'ville',
        'zipcode'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    protected $attributes = [
        'surname' => '',
        'payment_mode' => '',
        'mobile'=>'',
        'pays'=>'',
        'etat'=>'',
        'ville'=>'',
        'zipcode'=>'',
    ];
    public function paniers()
   {
       return $this->hasMany(Panier::class);
   }
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'paniers');
    }
    /* article non paye */
    public function articles_no_sold()
    {
        return $this->belongsToMany(Article::class, 'paniers')->where('sold',false);
    }
     /* article paye */
    public function articles_sold()
    {
        return $this->belongsToMany(Article::class, 'paniers')->where('sold',true);
    }
    public function articles_wishs()
    {
        return $this->belongsToMany(Article::class, 'wishes');
    }
}
