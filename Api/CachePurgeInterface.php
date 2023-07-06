<?php
/**
 * Copyright © TEVTEX. All rights reserved.
 * See LICENSE.txt for license details.
 * https://www.tevtex.com
 */
declare(strict_types=1);

namespace Tevtex\CacheManagement\Api;

use Tevtex\CacheManagement\Api\Data\CachePurgeResponseInterface;

interface CachePurgeInterface
{
    /**
     * @param string[] $cacheTypes
     *
     * @return CachePurgeResponseInterface
     */
    public function clean(
        array $cacheTypes = []
    ): CachePurgeResponseInterface;

    /**
     * @param string[] $cacheTypes
     *
     * @return CachePurgeResponseInterface
     */
    public function flush(
        array $cacheTypes = []
    ): CachePurgeResponseInterface;
}
