<?php

namespace Kfencer\Infrastructure\Cache\Slot;

interface CacheTagInterface
{
    public function getKey(): string;
}
