<?php

namespace Kfencer\Infrastructure\Cache\Slot;

trait CacheSlotTrait
{
    use KeyTrait;

    protected ?int $lifetime = null;

    /**
     * @var CacheTagInterface[]
     */
    protected array $tags = [];

    public function getLifetime(): ?int
    {
        return $this->lifetime;
    }

    /**
     * @return CacheTagInterface[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }
}