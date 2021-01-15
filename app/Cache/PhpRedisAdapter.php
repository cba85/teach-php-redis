<?php

namespace App\Cache;

use App\Cache\Contracts\CacheInterface;

class PhpRedisAdapter implements CacheInterface
{
    public function __construct(protected $client)
    {
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
