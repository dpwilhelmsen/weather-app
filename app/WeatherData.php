<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeatherData extends Model
{

    protected $table = 'weather_data';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'details',
    ];

    /**
     * Details being cast into an array
     *
     * @var array
     */
    protected $casts = [
        'details' => 'array',
    ];

    /**
     * Get the zip code that owns this data.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function zipcode()
    {
        return $this->belongsTo('App\Zipcode');
    }
}
