<?php

namespace App\Weather;

class RandomWeatherFetcher implements WeatherFetcherInterface
{
    public function fetch(string $city): WeatherInfo
    {
        // Simulate a random weather condition
        // 270-330 is a range for temperature in Kelvin (approx. -17 to 30 degrees Celsius)
        $temperature = rand(260, 300); // Random temperature in Kelvin
        // Simulate a random weather type based on temperature
        $weatherTypes = $temperature < 273 ? ['snowy', 'cloudy', 'sunny'] : ['sunny', 'cloudy', 'stormy'];
        $weatherType = $weatherTypes[array_rand($weatherTypes)];

        return new WeatherInfo(
            $city,
            $weatherType,
            $temperature
        );
    }
}
