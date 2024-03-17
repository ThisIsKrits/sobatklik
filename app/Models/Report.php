<?php

namespace App\Models;

use App\Models\API\AttachReport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['codes','report_date','categories_id','brand_id','reporter_id','admin_id','status'];

    public function category()
    {
        return $this->belongsTo(SosmedCategory::class,'categories_id','id');
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
}
