# kfencer/cache-slot
Tiny library for preventing code duplication when determining cache keys and cache lifetime. 

With gratitude to Dmitry Koterov for the idea.

## Requirements

- PHP 7.4+
- PSR/Cache

## Installation

Add to composer.json
```json
{
    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/kfencer/cache-slot"
        }
    ]
}
```

```sh
composer require kfencer/cache-slot
```

## Example

Define the slot with cache key dependencies in constructor:
```php
<?php

namespace App\Infrastructure\Cache\Claim;

use Kfencer\Infrastructure\Cache\CacheItemFabricInterface;
use Kfencer\Infrastructure\Cache\CacheItemFabricTrait;

class ClaimQuestionListSlot implements CacheItemFabricInterface
{
    use CacheItemFabricTrait;

    /**
     * @throws \InvalidArgumentException
     */
    public function __construct(int $claimId)
    {
        if ($claimId < 1) {
            throw new \InvalidArgumentException();
        }

        $this->setKeyFromArray([$claimId]);
    }
}
```

Use slot:
```php
$cacheSlot = new ClaimQuestionListSlot((int) $claim->getId());
$cacheItem = $cacheSlot->getCacheItem($this->cacheItemPool);

// ...

$cacheItem->set($questions);
$this->cacheItemPool->save($cacheItem);
```
