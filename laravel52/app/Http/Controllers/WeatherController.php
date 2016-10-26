<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use TheCodingMachine\WeatherApi\WeatherApi;

class WeatherController extends Controller
{
    /**
     * @var WeatherApi
     */
    private $weatherApi;

    public function __construct(WeatherApi $weatherApi)
    {

        $this->weatherApi = $weatherApi;
    }

    public function index()
    {
        $weather = $this->weatherApi->getWeather('fr', 'Paris');

        return view('welcome', [
            'weather' => $weather->getMainWeather(),
            'temperature' => $weather->getTemperatureInCelsius()
        ]);
    }
}
