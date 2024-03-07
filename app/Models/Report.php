<?php

namespace App\Models;

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

    public function user()
    {
        return $this->belongsTo(User::class, function ($query) {
            $query->where('id', $this->reporter_id)
                ->orWhere('id', $this->admin_id);
        });
    }

}
