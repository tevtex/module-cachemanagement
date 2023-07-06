<?php
/**
 * Copyright © TEVTEX. All rights reserved.
 * See LICENSE.txt for license details.
 * https://www.tevtex.com
 */
declare(strict_types=1);

namespace Tevtex\CacheManagement\Api\Data;

interface CachePurgeResponseInterface
{
    public const SUCCESS = 'success';
    public const MESSAGE = 'message';
    public const CACHE_TYPES = 'cache_types';

    /**
     * @return bool
     * @SuppressWarnings(PHPMD.BooleanGetMethodName)
     */
    public function getSuccess(): bool;

    /**
     * @param bool $success
     *
     * @return CachePurgeResponseInterface
     */
    public function setSuccess(
        bool $success
    ): CachePurgeResponseInterface;

    /**
     * @return string|null
     */
    public function getMessage(): ?string;

    /**
     * @param string $message
     *
     * @return CachePurgeResponseInterface
     */
    public function setMessage(
        string $message
    ): CachePurgeResponseInterface;

    /**
     * @return string[]|null
     */
    public function getCacheTypes(): ?array;

    /**
     * @param string[] $cacheTypes
     *
     * @return CachePurgeResponseInterface
     */
    public function setCacheTypes(
        array $cacheTypes
    ): CachePurgeResponseInterface;
}
