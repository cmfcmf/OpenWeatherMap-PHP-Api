<?php
/**
 * OpenWeatherMap-PHP-API — A php api to parse weather data from http://www.OpenWeatherMap.org .
 *
 * @license MIT
 *
 * Please see the LICENSE file distributed with this source code for further
 * information regarding copyright and licensing.
 *
 * Please visit the following links to read about the usage policies and the license of
 * OpenWeatherMap before using this class:
 *
 * @see http://www.OpenWeatherMap.org
 * @see http://www.OpenWeatherMap.org/terms
 * @see http://openweathermap.org/appid
 */
use Cmfcmf\OpenWeatherMap;
use Http\Factory\Guzzle\RequestFactory;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

require_once __DIR__ . '/bootstrap.php';

// Language of data (try your own language here!):
$lang = 'en';

// Units (can be 'metric' or 'imperial' [default]):
$units = 'metric';

// You can use every PSR-17 compatible HTTP request factory
// and every PSR-18 compatible HTTP client.
$httpRequestFactory = new RequestFactory();
$httpClient = GuzzleAdapter::createWithConfig([]);

$owm = new OpenWeatherMap($myApiKey, $httpClient, $httpRequestFactory);

// Example 1: Get hourly weather history between 2014-01-01 and today.
$history = $owm->getWeatherHistory('Berlin', new \DateTime('2014-01-01'), new \DateTime('now'), 'hour', $units, $lang);

foreach ($history as $weather) {
    echo 'Average temperature at '.$weather->time->format('d.m.Y H:i').': '.$weather->temperature."\n\r<br />";
}
