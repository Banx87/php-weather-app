<?php

require __DIR__ . '/inc/all.inc.php';

require_once __DIR__ . '/src/Weather/FakeWeatherFetcher.php';
$fetcher = new FakeWeatherFetcher();
$info = $fetcher->fetch('Los Angeles');

render(
	'index.view',
	['fetcher' => $fetcher, 'info' => $info]
);
