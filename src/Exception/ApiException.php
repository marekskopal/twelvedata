<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Exception;

abstract class ApiException extends \Exception
{
    public function __construct(string $message = '', int $code = 500)
    {
        parent::__construct($message, $code);
    }

    public static function fromCode(string $message = '', int $code = 500): self
    {
        return match ($code) {
            400 => new BadRequestException($message),
            401 => new UnauthorizedException($message),
            403 => new ForbiddenException($message),
            404 => new NotFoundException($message),
            414 => new ParameterTooLongException($message),
            429 => new TooManyRequestsException($message),
            500 => new InternalServerErrorException($message),
            default => new InternalServerErrorException($message),
        };
    }
}
