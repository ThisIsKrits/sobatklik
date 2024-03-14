<?php

namespace App\Models\API;

use App\Models\BrandList;
use App\Models\ReportType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['codes','report_date','category','type_id','brand_id','reporter_id','admin_id','complaint'];

    public function type()
    {
        return $this->belongsTo(ReportType::class, 'type_id','id');
    }

    public function brand()
    {
        return $this->belongsTo(BrandList::class, 'brand_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, function ($query) {
            $query->where('id', $this->reporter_id)
                ->orWhere('id', $this->admin_id);
        });
    }

    public function files()
    {
        return $this->hasMany(AttachReport::class, 'report_id');
    }
}
