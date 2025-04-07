<?php

namespace App\Weather;

class RemoteWeatherFetcher implements WeatherFetcherInterface
{
    public function fetch(string $city): WeatherInfo
    {

        $url = "https://downloads.codingcoursestv.eu/056%20-%20php/weather/weather.php?" . http_build_query(['city' => $city]);
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $json_data = curl_exec($ch);

        if ($json_data === false) {
            die('Error fetching JSON data: ' . curl_error($ch));
        }

        curl_close($ch);

        $data = json_decode($json_data, true);

        if ($data === null) {
            die('Error decoding JSON data');
        }

        return new WeatherInfo(
            $data['weather'],
            $data['temperature'],
            $data['city'],
        );
    }
}
