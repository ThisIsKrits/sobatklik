<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactCategory extends Model
{
    use HasFactory;

    protected $fillable = ['icon','name','status'];

    public function getStatusAttribute($value)
    {
        return match ($value) {
            StatusEnum::Aktif->value => 'Aktif',
            StatusEnum::TidakAktif->value => 'Tidak Aktif',
            default => 'Unknown',
        };
    }
}
