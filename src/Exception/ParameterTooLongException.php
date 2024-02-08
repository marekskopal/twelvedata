<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Exception;

class ParameterTooLongException extends ApiException
{
    public function __construct(string $message = '', int $code = 414)
    {
        parent::__construct($message, $code);
    }
}
