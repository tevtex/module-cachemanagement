<?php
/**
 * Copyright © TEVTEX. All rights reserved.
 * See LICENSE.txt for license details.
 * https://www.tevtex.com
 */
declare(strict_types=1);

namespace Tevtex\CacheManagement\Model\Data;

use Magento\Framework\DataObject;
use Tevtex\CacheManagement\Api\Data\CacheToggleResponseInterface;

class CacheToggleResponse extends DataObject implements CacheToggleResponseInterface
{
    /**
     * @inheritDoc
     */
    public function getSuccess(): bool
    {
        return $this->getData(self::SUCCESS);
    }

    /**
     * @inheritDoc
     */
    public function setSuccess(
        bool $success
    ): CacheToggleResponseInterface {
        return $this->setData(self::SUCCESS, $success);
    }

    /**
     * @inheritDoc
     */
    public function getMessage(): ?string
    {
        return $this->getData(self::MESSAGE);
    }

    /**
     * @inheritDoc
     */
    public function setMessage(
        string $message
    ): CacheToggleResponseInterface {
        return $this->setData(self::MESSAGE, $message);
    }

    /**
     * @inheritDoc
     */
    public function getCacheTypes(): ?array
    {
        return $this->getData(self::CACHE_TYPES);
    }

    /**
     * @inheritDoc
     */
    public function setCacheTypes(
        array $cacheTypes
    ): CacheToggleResponseInterface {
        return $this->setData(self::CACHE_TYPES, $cacheTypes);
    }
}
