<?php

require_once __DIR__.'/../vendor/autoload.php';

$apiKey = file_get_contents(__DIR__.'/../tests/.apiKey');
$openWeaverLib = new WebFu\OpenWeaver\OpenWeaver($apiKey);
$results = $openWeaverLib->getCurrentWeaver()->search('Newcastle');

var_dump($results);
