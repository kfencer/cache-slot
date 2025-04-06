<?php

namespace Kfencer\Infrastructure\Cache\Slot;

use Psr\Cache\CacheItemPoolInterface;

interface CacheKeyInterface
{
    public function getKey(): string;
    public function getInvalidator(CacheItemPoolInterface $cacheItemPool): \Closure;
}