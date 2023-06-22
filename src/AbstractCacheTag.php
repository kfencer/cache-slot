<?php

namespace Kfencer\Infrastructure\Cache\Slot;

abstract class AbstractCacheTag implements CacheTagInterface
{
    public function getKey(): string
    {
        static $key = null;

        if (!$key) {
            $key = md5(static::class);
        }

        return $key;
    }
}
