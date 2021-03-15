<?php

namespace App\Cache\Contracts;

interface CacheInterface
{
    public function get($key): string;
    public function set($key, $value);
    public function put($key, $value, $minutes = null);
    public function forever($key, $value);
    public function remember($key, $minutes = null, callable $callback);
    public function forget($key);
}
