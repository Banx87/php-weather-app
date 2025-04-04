<?php

namespace App\Weather;

class WeatherInfo
{
    public function __construct(
        public string $city,
        public string $weatherType,
        public int $temperatureKelvin
    ) {}
}
