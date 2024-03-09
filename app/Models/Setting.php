<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['term', 'theme_id'];

    public function color()
    {
        return $this->belongsTo(ColorSelect::class, 'theme_id','id');
    }
}
