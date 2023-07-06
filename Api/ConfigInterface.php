<?php
/**
 * Copyright © TEVTEX. All rights reserved.
 * See LICENSE.txt for license details.
 * https://www.tevtex.com
 */
declare(strict_types=1);

namespace Tevtex\CacheManagement\Api;

interface ConfigInterface
{
    public const XML_PATH_CACHE_MANAGEMENT_ENABLED = 'tevtex_cachemanagement/general/enabled';
    public const CACHE_MANAGEMENT_DISABLED_EXCEPTION_MESSAGE = 'Cache Management is disabled.';

    /**
     * @return bool
     */
    public function isEnabled(): bool;
}
