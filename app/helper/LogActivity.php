<?php

namespace App\Helper;

use App\Models\Activity;

class LogActivity
{
    public function createLog($log)
    {
        Activity::create($log);
    }
}
