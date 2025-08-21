<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Exception;

class InvalidArgumentException extends \InvalidArgumentException
{
    /** @param list<string> $parameters */
    public static function missingParameters(array $parameters): self
    {
        return new self('At least one of ' . implode(',', $parameters) . ' must be provided.');
    }
}
