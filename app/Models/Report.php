<?php

namespace App\Models;

use App\Models\API\AttachReport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['codes','report_date', 'type_id','contact_id','brand_id','reporter_id','admin_id','status', 'complaint'];

    public function categories()
    {
        return $this->belongsTo(ContactCategory::class,'contact_id','id');
    }

    public function brand()
    {
        return $this->belongsTo(BrandList::class, 'brand_id','id');
    }

    public function type()
    {
        return $this->belongsTo(ReportType::class, 'type_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function files()
    {
        return $this->hasMany(AttachReport::class, 'report_id');
    }

    public function reviews()
    {
        return $this->hasOne(Review::class, 'report_id','id');
    }

    public function getStatusTextAttribute()
    {
        switch ($this->status) {
            case 0:
                return 'Ada balasan user';
            case 1:
                return 'Sudah dibalas admin';
            case 2:
                return 'Selesai';
            default:
                return 'Status tidak valid';
        }
    }

    public function getOpeningTextAttribute()
    {
        return $this->opening == 1 ? 'Ya' : 'Tidak';
    }

    public function getClosingTextAttribute()
    {
        return $this->closing == 1 ? 'Ya' : 'Tidak';
    }
}
