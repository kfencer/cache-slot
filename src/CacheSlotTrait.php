<?php

namespace Kfencer\Infrastructure\Cache\Slot;

trait CacheSlotTrait
{
    protected string $key;
    protected ?int $lifetime = null;

    public function getKey(): string
    {
        return $this->key;
    }

    public function getLifetime(): ?int
    {
        return $this->lifetime;
    }

    protected function setKeyFromArray(array $args, string $separator = '|'): void
    {
        $this->key = implode($separator, $args);
    }
}