<?php

namespace Kfencer\Infrastructure\Cache\Slot;

interface CacheSlotInterface extends CacheKeyInterface
{
    public function getLifetime(): ?int;

    /**
     * @return CacheTagInterface[]
     */
    public function getTags(): array;
}