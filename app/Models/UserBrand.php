<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBrand extends Model
{
    use HasFactory;

    protected $table = 'user_brands';
    protected $fillable = ['brand_id','user_id'];
}
