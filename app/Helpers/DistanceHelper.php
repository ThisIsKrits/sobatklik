<?php

namespace App\Helpers;

class DistanceHelper
{
    public static function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371)
    {

        $delta_lat = $latitudeTo - $latitudeFrom;
        $delta_lon = $longitudeTo - $longitudeFrom;

        $alpha = $delta_lat / 2;
        $beta = $delta_lon / 2;

        $a = sin(deg2rad($alpha)) * sin(deg2rad($alpha)) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * sin(deg2rad($beta)) * sin(deg2rad($beta));
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        $distance = $earthRadius * $c;

        $distance = round($distance, 4);

        return $distance;
    }
}
