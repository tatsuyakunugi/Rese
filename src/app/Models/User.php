<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    //多対多のリレーション
    //1人のユーザーは複数のお店をお気に入り登録する。
    //1つの店舗は複数のユーザーからお気に入り登録される。
    //「お気に入り」というリソースを通じてユーザーとお店は多対多の関係である、と定義。
    public function like_shops()
    {
        return $this->belongsToMany(Shop::class, 'likes', 'user_id', 'shop_id');
    }

    //このお店に対してすでにお気に入り登録をしているかどうかを判定
    public function is_like($shopId)
    {
        return $this->likes()->where('shop_id', $shopId)->exists();
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
