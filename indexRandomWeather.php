<?php

// https://downloads.codingcoursestv.eu/056%20-%20php/weather/weather.php

// header('Content-Type: text/plain');
// phpinfo();

use App\Weather\RandomWeatherFetcher;
// use App\Weather\FakeFetcherInterface;

require __DIR__ . '/inc/all.inc.php';

require_once __DIR__ . '/src/Weather/FakeWeatherFetcher.php';
$fetcher = new RandomWeatherFetcher();
$info = $fetcher->fetch('Los Angeles');
$response = [];

// Step 1: Initialize a cURL session
$url = "https://downloads.codingcoursestv.eu/056%20-%20php/weather/weather.php?" . http_build_query(['city' => 'Tampere']);
$ch = curl_init($url);

// Step 2: Set options for the cURL transfer
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

// Step 3: Execute the cURL session and fetch the JSON data
$json_data = curl_exec($ch);

// Check for cURL errors
if ($json_data === false) {
	die('Error fetching JSON data: ' . curl_error($ch));
}

// Step 4: Close the cURL session
curl_close($ch);

// Step 5: Decode the JSON data into a PHP array
$data = json_decode($json_data, true);

// Check if the data was successfully decoded
if ($data === null) {
	die('Error decoding JSON data');
}
// Step 6: Access the specific information
$weather = $data['weather'];
$temperature_kelvin = $data['temperature'];
$city = $data['city'];

// var_dump($data);

render(
	'index.view',
	[
		'fetcher' => $fetcher,
		'info' => $info,
		'weather' => $weather,
		'temperature_kelvin' => $temperature_kelvin,
		'city' => $city
	]
);
