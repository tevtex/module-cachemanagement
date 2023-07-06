<?php
/**
 * Copyright © TEVTEX. All rights reserved.
 * See LICENSE.txt for license details.
 * https://www.tevtex.com
 */
declare(strict_types=1);

namespace Tevtex\CacheManagement\Model;

use InvalidArgumentException;
use Magento\Framework\App\Cache\Manager;
use Tevtex\CacheManagement\Api\CacheTypesInterface;

class CacheTypes implements CacheTypesInterface
{
    /**
     * @param Manager $cacheManager
     */
    public function __construct(
        private readonly Manager $cacheManager
    ) {
    }

    /**
     * @param string[] $requestedCacheTypes
     *
     * @return string[]
     */
    public function get(array $requestedCacheTypes): array
    {
        $availableCacheTypes = $this->cacheManager->getAvailableTypes();
        if (empty($requestedCacheTypes)) {
            return $availableCacheTypes;
        }

        $unsupportedTypes = array_diff(
            $requestedCacheTypes,
            $availableCacheTypes
        );

        if ($unsupportedTypes) {
            throw new InvalidArgumentException(
                "The following requested cache types are not supported: '" .
                join("', '", $unsupportedTypes) . "'."
            );
        }

        return array_intersect(
            $requestedCacheTypes,
            $availableCacheTypes
        );
    }
}
