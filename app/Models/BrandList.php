<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandList extends Model
{
    use HasFactory;

    protected $fillable = ['logo','name','kode_brand','tagline','maskot','address','status'];

    public function contact()
    {
        return $this->hasMany(ContactBrand::class,'brand_id','id');
    }

    public function sosmed()
    {
        return $this->hasMany(SosmedBrand::class,'brand_id','id');
    }
}
