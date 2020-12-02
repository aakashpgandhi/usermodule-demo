<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_picture', 'customer_id', 'status','device_type','device_token','otp'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'user_categories');
    }

    public function getprofilePictureAttribute($value)
    {
        return !empty($value) ?  asset('storage/users/profile').'/'.$value : null;
    }

    public function friends()
    {
        return $this->belongsToMany('App\Models\User', 'friend_user', 'user_id', 'friend_id');
    }

    public function subscription()
    {
        return $this->belongsToMany('App\Models\User', 'vendor_subscription', 'user_id', 'vendor_id');
    }

    public function wishlist()
    {
        return $this->belongsToMany('App\Models\User', 'user_wishlist', 'user_id', 'product_id');
    }
}
