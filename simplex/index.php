<?php
require_once 'vendor/autoload.php';

use TheCodingMachine\Guzzle\GuzzleServiceProvider;
use TheCodingMachine\Monolog\MonologServiceProvider;
use TheCodingMachine\StashServiceProvider;
use TheCodingMachine\WeatherApi\WeatherApiServiceProvider;
use TheCodingMachine\WeatherApi\WeatherApi;

$container = new Simplex\Container();

$container->register(new GuzzleServiceProvider());
$container->register(new StashServiceProvider());
$container->register(new MonologServiceProvider());
$container->register(new WeatherApiServiceProvider());

$container->set('openWeatherMapApiKey', '313fdbf361b71a082012aaee17482577');

$weatherApi = $container->get(WeatherApi::class);
$weather = $weatherApi->getWeather('fr', 'Paris');

echo "Weather in Paris is ".$weather->getMainWeather()." and temperature is ".$weather->getTemperatureInCelsius()."\n";
