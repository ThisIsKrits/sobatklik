<?php
namespace App\Trait;

use App\Models\API\Report;
use App\Models\User;

trait AdminBrandTrait
{
    private function assignAdmin($brandId)
    {
        $admins = User::where('brand_id', $brandId)->get();

        if ($admins->isEmpty()) {
            return null;
        }

        $sortedAdmins = $admins->sortBy(function ($admin) {
            return Report::where('admin_id', $admin->id)->count();
        });

        $chosenAdmin = $sortedAdmins->first();

        return $chosenAdmin->id;
    }
}
