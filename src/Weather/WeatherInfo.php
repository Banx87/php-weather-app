<?php

namespace App\Weather;

class WeatherInfo
{
    public function __construct(
        public string $weatherType,
        public int $temperatureKelvin,
        public string $city,
    ) {}
}
