<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactBrand extends Model
{
    use HasFactory;

    protected $fillable = ['brand_id', 'contact_id', 'label', 'link'];

    public function brand()
    {
        return $this->belongsTo(BrandList::class, 'brand_id', 'id');
    }

    public function contact()
    {
        return $this->belongsTo(ContactCategory::class, 'contact_id', 'id');
    }
}
