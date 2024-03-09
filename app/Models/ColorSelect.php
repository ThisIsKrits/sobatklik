<?php

namespace App\Models;

use App\Models\API\ListTheme;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorSelect extends Model
{
    use HasFactory;

    protected $fillable = ['theme_id'];

    public function color()
    {
        return $this->belongsTo(ListTheme::class, 'theme_id', 'id');
    }
}
