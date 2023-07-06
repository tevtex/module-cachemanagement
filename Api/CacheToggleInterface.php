<?php
/**
 * Copyright © TEVTEX. All rights reserved.
 * See LICENSE.txt for license details.
 * https://www.tevtex.com
 */
declare(strict_types=1);

namespace Tevtex\CacheManagement\Api;

use Tevtex\CacheManagement\Api\Data\CacheToggleResponseInterface;

interface CacheToggleInterface
{
    /**
     * @param string[] $cacheTypes
     *
     * @return CacheToggleResponseInterface
     */
    public function enable(
        array $cacheTypes = []
    ): CacheToggleResponseInterface;

    /**
     * @param string[] $cacheTypes
     *
     * @return CacheToggleResponseInterface
     */
    public function disable(
        array $cacheTypes = []
    ): CacheToggleResponseInterface;
}
