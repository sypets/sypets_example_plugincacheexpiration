<?php
declare(strict_types=1);
namespace Sypets\SypetsExamplePlugincacheexpiration\EventListener;

use TYPO3\CMS\Frontend\Cache\CacheMetadata;
use TYPO3\CMS\Frontend\Event\SetPageCacheEvent;

final class PageCacheEventListener
{
    private CacheMetadata $cacheMetadata;

    public function setCacheMetadata(CacheMetadata $cacheMetadata)
    {
        $this->cacheMetadata = $cacheMetadata;
    }

    public function __invoke(SetPageCacheEvent $event): void
    {
        $event->addCacheExpires($this->cacheMetadata->getCacheExpires());
        $event->addCacheTags($this->cacheMetadata->getCacheTags());
    }
}
