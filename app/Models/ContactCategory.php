<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactCategory extends Model
{
    use HasFactory;

    protected $fillable = ['icon','name','status'];

    public function contactBrand()
    {
        return $this->hasMany(ContactBrand::class, 'contact_id', 'id');
    }

    public function getStatusAttribute($value)
    {
        return match ($value) {
            StatusEnum::Aktif->value => 'Aktif',
            StatusEnum::TidakAktif->value => 'Tidak',
            default => 'Unknown',
        };
    }
}
