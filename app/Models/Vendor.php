<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Vendor extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;
    protected $guard = 'vendor';


    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $fillable = [
        'business_name', 'business_email', 'abn_no', 'vendor_avatar', 'registration_document', 'website',
        'headquarters_address', 'phone_number', 'store_address','password','is_active'
    ];

    public function getVendorAvatarAttribute($value)
    {
        if($value) {
            return asset('storage/uploads/vendor/profile'.'/'.$value);
        } else {
            return NULL;
        }
    }

    public function getRegistrationDocumentAttribute($value)
    {
        if($value) {
            return asset('storage/uploads/vendor/document'.'/'.$value);
        } else {
            return NULL;
        }
    }

    public function subscription()
    {
        return $this->belongsToMany('App\Models\Vendor', 'vendor_subscription', 'vendor_id', 'user_id');
    }

    public function storesDetail()
    {
        return $this->hasMany('App\Models\Store',  'vendor_id', 'id');
    }
}
