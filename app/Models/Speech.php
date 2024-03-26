<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speech extends Model
{
    use HasFactory;

    protected $fillable = ['user_from','user_to','content'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_from', 'id');
    }
}
