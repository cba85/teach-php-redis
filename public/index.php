<?php

use App\Cache\PhpRedisAdapter;
use App\Cache\PredisAdapter;

require __DIR__ . "/../vendor/autoload.php";

//PHP Redis

/*
$client = new Redis;
$client->connect('127.0.0.1', 6379);

$cache = new PhpRedisAdapter($client);
echo $cache->get('email');
*/

// Predis

$client = new Predis\Client([
    'scheme' => 'tcp',
    'host'   => '127.0.0.1',
    'port'   => 6379,
    'password' =>  null
]);

$cache = new PredisAdapter($client);

//$client->set('name', 'Clément');
//echo $client->get('email');
//$cache->set('email', 'clement@webstart.com');
//echo $cache->get('email');
