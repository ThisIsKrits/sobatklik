<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandList extends Model
{
    use HasFactory;

    protected $fillable = ['logo','name','kode_brand','tagline','maskot','status'];

    public function contacts()
    {
        return $this->hasMany(ContactBrand::class,'brand_id','id');
    }

    public function sosmeds()
    {
        return $this->hasMany(SosmedBrand::class,'brand_id','id');
    }

    public function addresses()
    {
        return $this->hasMany(AddressBrand::class,'brand_id','id');
    }

    public function getStatusTextAttribute()
    {
        return $this->status == 1 ? 'Aktif' : 'Tidak Aktif';
    }
}
