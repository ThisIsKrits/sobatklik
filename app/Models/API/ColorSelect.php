<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ColorSelect extends Model
{
    use HasFactory;

    public function getTheme() :BelongsTo
    {
        return $this->belongsTo(ListTheme::class, 'theme_id', 'id');
    }
}
