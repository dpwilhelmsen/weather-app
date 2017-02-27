<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'zipcode',
    ];

    /**
     * Get users who use this zip code
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * Get the weather data for this zip
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function weatherData()
    {
        return $this->hasMany('App\WeatherData');
    }
}
