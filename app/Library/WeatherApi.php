<?php
/**
 * Created by PhpStorm.
 * User: daniel.wilhelmsen
 * Date: 2/27/17
 * Time: 1:37 AM
 */

namespace App\Library;


class WeatherApi
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('WEATHER_API_KEY','');
    }

    public function getCurrentDataForZipcode($zipcode)
    {
        $query = urlencode($zipcode);
        $response = \Guzzle::get("http://api.openweathermap.org/data/2.5/weather?zip=$query&units=imperial&appid={$this->apiKey}");
        $queryResults = json_decode((string) $response->getBody(),true);

        return (is_array($queryResults)) ? $queryResults : false;
    }
}