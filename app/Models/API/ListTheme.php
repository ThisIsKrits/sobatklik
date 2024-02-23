<?php

namespace App\Models\API;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListTheme extends Model
{
    use HasFactory;

    protected $fillable = ['colors'];

    public function getTheme() :BelongsTo
    {
        return $this->belongsTo(User::class,'theme_id','id');
    }
}
