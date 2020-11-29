<?php

require_once __DIR__.'/../vendor/autoload.php';

$apiKey = file_get_contents(__DIR__.'/../tests/.apiKey');

if (!$apiKey) {
    echo 'Please provide an api key before continue';
    exit();
}

$currentWeather = new WebFu\OpenWeather\CurrentWeather($apiKey);

echo '<h1>OpenWeather Examples</h1>'.PHP_EOL;

echo '<h2>Get By City Name</h2>'.PHP_EOL;
$singleCity = $currentWeather->search('London');
print_r($singleCity);

echo '<h2>Get By City ID</h2>'.PHP_EOL;
$fromCityId = $currentWeather->getByCityId(2172797);
print_r($fromCityId);

echo '<h2>Get By Geographic Coordinates</h2>'.PHP_EOL;
$fromGeoCoordinates = $currentWeather->getByGeoCoordinates(35, 139);
print_r($fromGeoCoordinates);

echo '<h2>Get By ZIP Code</h2>'.PHP_EOL;
$fromZipCode = $currentWeather->getByZipCode(94040, 'US');
print_r($fromZipCode);

echo '<h2>Get By Rectangle Area</h2>'.PHP_EOL;
$boundingBox = new WebFu\OpenWeather\BoundingBox(12, 32, 15, 37, 10);
$fromRectangleArea = $currentWeather->getByRectangleArea($boundingBox);
print_r($fromRectangleArea);

echo '<h2>Get By Circle Area</h2>'.PHP_EOL;
$fromCircleArea = $currentWeather->getByCircleArea(55.5, 37.5, 10);
print_r($fromCircleArea);

echo '<h2>Get By Several City Ids</h2>'.PHP_EOL;
$fromCityIds = $currentWeather->getByCityIds([24901, 703448, 2643743]);
print_r($fromCityIds);
