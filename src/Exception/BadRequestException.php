<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Exception;

class BadRequestException extends ApiException
{
    public function __construct(string $message = '', int $code = 400)
    {
        parent::__construct($message, $code);
    }
}
