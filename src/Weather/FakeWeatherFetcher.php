<?php

use App\Weather\WeatherFetcherInterface;
use App\Weather\WeatherInfo;

class FakeWeatherFetcher implements WeatherFetcherInterface
{
    public function fetch(string $city): WeatherInfo
    {
        return new WeatherInfo(
            $city,
            'snowy',
            260
        );
    }
}
