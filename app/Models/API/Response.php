<?php

namespace App\Models\API;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = ['report_date','report_id', 'content','user_id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
