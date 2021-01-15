<?php

namespace App\Cache\Contracts;

interface CacheInterface
{
    public function get($key): string;
    public function set($key, $value);
}
