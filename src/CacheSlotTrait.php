<?php

namespace Kfencer\Infrastructure\Cache\Slot;

trait CacheSlotTrait
{
    protected string $key;
    protected ?int $lifetime = null;

    /**
     * @var CacheTagInterface[]
     */
    protected array $tags = [];

    public function getKey(): string
    {
        return $this->key;
    }

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

    protected function setKey(array $args = [], string $separator = '|'): void
    {
        array_unshift($args, static::class);
        $this->key = md5(implode($separator, $args));
    }
}