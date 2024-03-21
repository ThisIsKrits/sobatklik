<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressBrand extends Model
{
    use HasFactory;

    protected $fillable = ['brand_id','long','lat'];
}
