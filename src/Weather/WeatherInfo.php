<?php

namespace App\Weather;

class WeatherInfo
{
    public function __construct(
        public string $weatherType,
        public int $temperatureKelvin,
        public string $city,
    ) {}

    public function getFahrenheit(): float
    {
        return round(($this->temperatureKelvin - 273.15) * (9 / 5) + 32);
    }

    public function getCelsius(): float
    {
        return round($this->temperatureKelvin - 273.15);
    }

    public function getFormattedDate(): string
    {
        date_default_timezone_set('UTC'); // Set the default timezone
        return date('l, j') . '<sup>' . date('S') . '</sup>';
    }
}