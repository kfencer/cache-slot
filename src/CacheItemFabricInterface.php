<?php

namespace Kfencer\Infrastructure\Cache\Slot;

use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;

interface CacheItemFabricInterface extends CacheSlotInterface
{
    public function getCacheItem(CacheItemPoolInterface $cacheItemPool): CacheItemInterface;
}