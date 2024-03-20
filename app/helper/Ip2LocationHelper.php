<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class Ip2LocationHelper
{
    public static function getLocationByIp($ipAddress)
    {
        $apiKey = env('IP2LOCATION_API_KEY');
        $url = "https://api.ip2location.com/?ip={$ipAddress}&key=54B0F81D4EEE1C3E9E4D1D403F6573F4&format=json";

        $client = new Client();
        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);

        if (isset($data['status']) && $data['status'] == 'OK') {
            return $data['data'];
        }

        return null;
    }
}
