<?php
/**
 * Copyright © TEVTEX. All rights reserved.
 * See LICENSE.txt for license details.
 * https://www.tevtex.com
 */
declare(strict_types=1);

namespace Tevtex\CacheManagement\Api;

interface CacheTypesInterface
{
    /**
     * @param string[] $requestedCacheTypes
     *
     * @return string[]
     */
    public function get(array $requestedCacheTypes): array;
}
