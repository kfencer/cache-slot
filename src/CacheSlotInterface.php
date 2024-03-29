<?php

namespace Kfencer\Infrastructure\Cache\Slot;

interface CacheSlotInterface
{
    public function getKey(): string;
    public function getLifetime(): ?int;

    /**
     * @return CacheTagInterface[]
     */
    public function getTags(): array;
}