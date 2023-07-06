<?php
/**
 * Copyright © TEVTEX. All rights reserved.
 * See LICENSE.txt for license details.
 * https://www.tevtex.com
 */
declare(strict_types=1);

namespace Tevtex\CacheManagement\Model;

use Exception;
use Magento\Framework\App\Cache\Manager;
use Magento\Framework\Event\ManagerInterface;
use Tevtex\CacheManagement\Api\CachePurgeInterface;
use Tevtex\CacheManagement\Api\CacheTypesInterface;
use Tevtex\CacheManagement\Api\ConfigInterface;
use Tevtex\CacheManagement\Api\Data\CachePurgeResponseInterface;
use Tevtex\CacheManagement\Api\Data\CachePurgeResponseInterfaceFactory;

class CachePurge implements CachePurgeInterface
{
    private const ADMINHTML_CACHE_FLUSH_SYSTEM_EVENT = 'adminhtml_cache_flush_system';
    private const ADMINHTML_CACHE_FLUSH_ALL_EVENT = 'adminhtml_cache_flush_all';

    /**
     * @param Manager $cacheManager
     * @param ConfigInterface $config
     * @param CacheTypesInterface $cacheTypes
     * @param ManagerInterface $eventManager
     * @param CachePurgeResponseInterfaceFactory $cachePurgeResponse
     */
    public function __construct(
        private readonly Manager $cacheManager,
        private readonly ConfigInterface $config,
        private readonly CacheTypesInterface $cacheTypes,
        private readonly ManagerInterface $eventManager,
        private readonly CachePurgeResponseInterfaceFactory $cachePurgeResponse
    ) {
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function clean(array $cacheTypes = []): CachePurgeResponseInterface
    {
        if (!$this->config->isEnabled()) {
            throw new Exception(ConfigInterface::CACHE_MANAGEMENT_DISABLED_EXCEPTION_MESSAGE);
        }

        $cachePurgeResponse = $this->cachePurgeResponse->create();
        try {
            $cacheTypes = $this->cacheTypes->get($cacheTypes);
            /** @var CachePurgeResponseInterface $cachePurgeResponse */
            $this->eventManager->dispatch(self::ADMINHTML_CACHE_FLUSH_SYSTEM_EVENT);
            $this->cacheManager->clean($cacheTypes);
            $cachePurgeResponse->setSuccess(true);
        } catch (Exception $e) {
            $cachePurgeResponse->setSuccess(false);
            $cachePurgeResponse->setMessage($e->getMessage());
        } finally {
            $cachePurgeResponse->setCacheTypes($cacheTypes);
        }

        return $cachePurgeResponse;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function flush(array $cacheTypes = []): CachePurgeResponseInterface
    {
        if (!$this->config->isEnabled()) {
            throw new Exception(ConfigInterface::CACHE_MANAGEMENT_DISABLED_EXCEPTION_MESSAGE);
        }

        $cachePurgeResponse = $this->cachePurgeResponse->create();
        try {
            $cacheTypes = $this->cacheTypes->get($cacheTypes);
            /** @var CachePurgeResponseInterface $cachePurgeResponse */
            $this->eventManager->dispatch(self::ADMINHTML_CACHE_FLUSH_ALL_EVENT);
            $this->cacheManager->flush($cacheTypes);
            $cachePurgeResponse->setSuccess(true);
        } catch (Exception $e) {
            $cachePurgeResponse->setSuccess(false);
            $cachePurgeResponse->setMessage($e->getMessage());
        } finally {
            $cachePurgeResponse->setCacheTypes($cacheTypes);
        }

        return $cachePurgeResponse;
    }
}
