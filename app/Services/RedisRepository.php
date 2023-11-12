<?php

namespace App\Services;

use Illuminate\Support\Facades\Redis;

class RedisRepository
{
    public function get($key)
    {
        return Redis::get($key);
    }

    public function set($key, $value)
    {
        Redis::set($key, $value);
    }
}