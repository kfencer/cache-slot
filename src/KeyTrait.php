<?php

namespace Kfencer\Infrastructure\Cache\Slot;

use Psr\Cache\CacheItemPoolInterface;

trait KeyTrait
{
    protected string $key;

    public function getKey(): string
    {
        return $this->key;
    }

    public function getInvalidator(CacheItemPoolInterface $cacheItemPool): \Closure
    {
        return function () use ($cacheItemPool) {
            return $cacheItemPool->deleteItem(
                $this->getKey()
            );
        };
    }

    protected function setKey(array $args = [], string $separator = '|'): void
    {
        array_unshift($args, static::class);
        $this->key = md5(implode($separator, $args));
    }
}