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

    public function get($key): string
    {
        return $this->client->get($key);
    }

    public function set($key, $value)
    {
        return $this->client->set($key, $value);
    }

    public function put($key, $value, $minutes = null)
    {
        if ($minutes == null) {
            return $this->forever($key, $value);
        }

        return $this->client->setex($key, (int) max(1, $minutes * 60), $value);
    }

    public function forever($key, $value)
    {
        $this->client->set($key, $value);
    }

    public function remember($key, $minutes = null, callable $callback)
    {
        if (!is_null($value = $this->get($key))) {
            return $value;
        }

        $this->put($key, $value = $callback(), $minutes);
        return $value;
    }

    public function forget($key)
    {
        return $this->client->del($key);
    }
}
