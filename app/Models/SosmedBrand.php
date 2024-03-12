<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SosmedBrand extends Model
{
    use HasFactory;

    protected $fillable = ['brand_id', 'sosmed_id', 'label', 'link'];

    public function brand()
    {
        return $this->belongsTo(BrandList::class, 'brand_id', 'id');
    }

    public function sosmed()
    {
        return $this->belongsTo(SosmedCategory::class, 'sosmed_id', 'id');
    }
}
