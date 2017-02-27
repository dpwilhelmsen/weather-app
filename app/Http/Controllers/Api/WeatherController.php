<?php
/**
 * Created by PhpStorm.
 * User: daniel.wilhelmsen
 * Date: 2/26/17
 * Time: 1:44 AM
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\WeatherDataRepository;
use Illuminate\Http\Request;
use App\Http\Requests;

class WeatherController extends Controller
{
    /**
     * @var WeatherDataRepository
     */
    protected $weatherData;

    /**
     * WeatherController constructor.
     * @param WeatherDataRepository $weatherData
     */
    public function __construct(WeatherDataRepository $weatherData)
    {
        $this->weatherData = $weatherData;
    }

    public function index(Request $request)
    {
        if(!$request->user()) {
            return response()->json([
                'message' => 'Not Authorized',
            ], 401);
        }

        $zipcodes = $request->user()->zipcodes;
        $data = $zipcodes->map(function($zipcode){
            return $this->weatherData->getCurrentWeather($zipcode);
        });

        return response()->json([
            'data' => $data->map(function($weatherData) {
                return array_merge($weatherData->details, ['zipcode' => $weatherData->zipcode->zipcode]);
            }),
        ]);
    }
}