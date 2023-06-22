<?php

namespace Kfencer\Infrastructure\Cache\Slot;

use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;

trait CacheItemFabricTrait
{
    use CacheSlotTrait;

    public function getCacheItem(CacheItemPoolInterface $cacheItemPool): CacheItemInterface
    {
        $cacheItem = $cacheItemPool->getItem($this->getKey());

        $lifetime = $this->getLifetime();

        if ($lifetime !== null) {
            $cacheItem->expiresAfter($lifetime);
        }

        $tags = array_map(
            fn(CacheTagInterface $tag): string => $tag->getKey(),
            $this->getTags()
        );

        if ($tags) {
            $cacheItem->tag($tags);
        }

        return $cacheItem;
    }
}