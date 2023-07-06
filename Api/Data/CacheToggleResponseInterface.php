<?php
/**
 * Copyright © TEVTEX. All rights reserved.
 * See LICENSE.txt for license details.
 * https://www.tevtex.com
 */
declare(strict_types=1);

namespace Tevtex\CacheManagement\Api\Data;

interface CacheToggleResponseInterface
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
     * @return CacheToggleResponseInterface
     */
    public function setSuccess(
        bool $success
    ): CacheToggleResponseInterface;

    /**
     * @return string|null
     */
    public function getMessage(): ?string;

    /**
     * @param string $message
     *
     * @return CacheToggleResponseInterface
     */
    public function setMessage(
        string $message
    ): CacheToggleResponseInterface;

    /**
     * @return string[]|null
     */
    public function getCacheTypes(): ?array;

    /**
     * @param string[] $cacheTypes
     *
     * @return CacheToggleResponseInterface
     */
    public function setCacheTypes(
        array $cacheTypes
    ): CacheToggleResponseInterface;
}
