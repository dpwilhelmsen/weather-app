<?php
/**
 * Created by PhpStorm.
 * User: daniel.wilhelmsen
 * Date: 2/27/17
 * Time: 1:21 AM
 */

namespace App\Repositories;


use App\WeatherData;
use App\Zipcode;
use Carbon\Carbon;
use App\Library\WeatherApi;
use Illuminate\Support\Facades\DB;

class WeatherDataRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = WeatherData::class;

    /**
     * Returns the current weather for a zipcode model.
     *
     * @param Zipcode $zipcode
     * @return mixed
     */
    public function getCurrentWeather(Zipcode $zipcode)
    {
        $weatherData = $this->query()->where([
            ['zipcode_id', '=', $zipcode->id],
            ['created_at', '>', Carbon::now()->subMinutes(10)]
        ])->first();

        if($weatherData) return $weatherData;

        $weatherApi = new WeatherApi();
        $currentWeather = $weatherApi->getCurrentDataForZipcode($zipcode->zipcode);
        if($currentWeather) {
            $weatherData = $this->create($currentWeather, $zipcode);
            return $weatherData;
        }

    }

    /**
     * Creates a weather data record.
     *
     * @param array $data
     * @param $zipcode
     * @return mixed
     */
    public function create(array $data, Zipcode $zipcode)
    {
        $weatherData = self::MODEL;
        $weatherData = new $weatherData();
        $weatherData->details = $data;

        DB::transaction(function () use ($weatherData, $zipcode) {
            if ($weatherData->save()) {
                $weatherData->zipcode()->associate($zipcode);
                $weatherData->save();
            }
        });

        return $weatherData;
    }
}