<?php

use App\Weather\RandomWeatherFetcher;
use App\Weather\FakeFetcherInterface;

require __DIR__ . '/inc/all.inc.php';

require_once __DIR__ . '/src/Weather/FakeWeatherFetcher.php';
$fetcher = new RandomWeatherFetcher();
$info = $fetcher->fetch('Los Angeles');

render(
	'index.view',
	['fetcher' => $fetcher, 'info' => $info]
);
