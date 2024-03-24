<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBrand extends Model
{
    use HasFactory;

    protected $table = 'user_brands';
    protected $fillable = ['brand_id','user_id'];

    public function brand()
    {
        return $this->belongsTo(BrandList::class, 'brand_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
