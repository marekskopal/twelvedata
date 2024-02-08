<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Exception;

class UnauthorizedException extends ApiException
{
    public function __construct(string $message = '', int $code = 401)
    {
        parent::__construct($message, $code);
    }
}
