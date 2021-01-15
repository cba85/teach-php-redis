<?php

namespace App\Cache;

use App\Cache\Contracts\CacheInterface;
use Predis\Client;

class PredisAdapter implements CacheInterface
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get($key)
    {
        return $this->client->get($key);
    }

    public function set($key, $value)
    {
        return $this->client->set($key, $value);
    }
}
