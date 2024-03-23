<?php
namespace App\Trait;

use App\Models\API\Report;
use App\Models\User;
use App\Models\UserBrand;

trait AdminBrandTrait
{
    private function assignAdmin($brandId)
    {
        $admins = UserBrand::where('brand_id', $brandId)->get();

        if ($admins->isEmpty()) {
            return 1;
        }

        $sortedAdmins = $admins->sortBy(function ($admin) {
            return Report::where('admin_id', $admin->user_id)->count();
        });

        $chosenAdmin = $sortedAdmins->first();

        return $chosenAdmin->user_id;
    }
}
