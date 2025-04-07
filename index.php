<?php

// https://downloads.codingcoursestv.eu/056%20-%20php/weather/weather.php

use App\Weather\RemoteWeatherFetcher;

require __DIR__ . '/inc/all.inc.php';

$fetcher = new RemoteWeatherFetcher();

try {
	$info = $fetcher->fetch('Tampere, Finland');

	if (empty($info)) {
		echo ('Weather info not found!');
		exit;
	}

	render(
		'index.view',
		[
			'info' => $info,
			// 'weatherType' => $info->weatherType,
			// 'temperatureKelvin' => $info->temperatureKelvin,
			// 'city' => $info->city,
		]
	);
} catch (Exception $e) {
	echo 'An error occurred: ' . $e->getMessage();
	exit;
}