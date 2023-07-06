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
use Tevtex\CacheManagement\Api\CacheToggleInterface;
use Tevtex\CacheManagement\Api\CacheTypesInterface;
use Tevtex\CacheManagement\Api\ConfigInterface;
use Tevtex\CacheManagement\Api\Data\CacheToggleResponseInterface;
use Tevtex\CacheManagement\Api\Data\CacheToggleResponseInterfaceFactory;

class CacheToggle implements CacheToggleInterface
{
    /**
     * @param Manager $cacheManager
     * @param ConfigInterface $config
     * @param CacheTypesInterface $cacheTypes
     * @param CacheToggleResponseInterfaceFactory $cachePurgeResponse
     */
    public function __construct(
        private readonly Manager $cacheManager,
        private readonly ConfigInterface $config,
        private readonly CacheTypesInterface $cacheTypes,
        private readonly CacheToggleResponseInterfaceFactory $cachePurgeResponse
    ) {
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function enable(
        array $cacheTypes = []
    ): CacheToggleResponseInterface {
        if (!$this->config->isEnabled()) {
            throw new Exception(ConfigInterface::CACHE_MANAGEMENT_DISABLED_EXCEPTION_MESSAGE);
        }

        return $this->toggle($cacheTypes);
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function disable(
        array $cacheTypes = []
    ): CacheToggleResponseInterface {
        if (!$this->config->isEnabled()) {
            throw new Exception(ConfigInterface::CACHE_MANAGEMENT_DISABLED_EXCEPTION_MESSAGE);
        }

        return $this->toggle($cacheTypes, false);
    }

    /**
     * @param array $cacheTypes
     * @param bool $enabled
     *
     * @return CacheToggleResponseInterface
     */
    private function toggle(
        array $cacheTypes = [],
        bool $enabled = true
    ): CacheToggleResponseInterface {
        $cacheTypes = $this->cacheTypes->get($cacheTypes);
        $this->cacheManager->setEnabled($cacheTypes, $enabled);
        /** @var CacheToggleResponseInterface $cachePurgeResponse */
        $cachePurgeResponse = $this->cachePurgeResponse->create();
        $cachePurgeResponse->setSuccess(true);
        $cachePurgeResponse->setCacheTypes($cacheTypes);

        return $cachePurgeResponse;
    }
}
