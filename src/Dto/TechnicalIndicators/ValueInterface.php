<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators;

/**
 * @template Class of ValueInterface
 * @template Type of array
 */
interface ValueInterface
{
    /**
     * @param Type $data
     * @return Class
     */
    public static function fromArray(array $data): self;
}
