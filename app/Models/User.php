<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\StatusEnum;
use App\Models\API\ListTheme;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'birthdate',
        'phone',
        'email',
        'password',
        'status',
        'nickname',
        'brand_id',
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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    // public function getStatusAttribute($value)
    // {
    //     return match ($value) {
    //         StatusEnum::Aktif->value => 'Aktif',
    //         StatusEnum::TidakAktif->value => 'Tidak',
    //         default => 'Unknown',
    //     };
    // }

    public function getStatusTextAttribute()
    {
        return $this->status == 1 ? 'Aktif' : 'Tidak Aktif';
    }

    public function brands()
    {
        return $this->belongsToMany(BrandList::class, 'user_brands', 'user_id', 'brand_id');
    }

    public function profile()
    {
        return $this->hasOne(ImageProfile::class,'user_id','id');
    }
}
