<?php

namespace Kfencer\Infrastructure\Cache\Slot;

trait KeyTrait
{
    protected string $key;

    public function getKey(): string
    {
        return $this->key;
    }

    protected function setKey(array $args = [], string $separator = '|'): void
    {
        array_unshift($args, static::class);
        $this->key = md5(implode($separator, $args));
    }
}