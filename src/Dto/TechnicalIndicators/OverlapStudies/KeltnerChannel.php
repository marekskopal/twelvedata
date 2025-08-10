<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type KeltnerChannelType array{
 *     datetime: string,
 *     upper_line: string,
 *     middle_line: string,
 *     lower_line: string,
 * }
 * @implements ValueInterface<KeltnerChannel, KeltnerChannelType>
 */
readonly class KeltnerChannel implements ValueInterface
{
    public function __construct(
        public DateTimeImmutable $datetime,
        public string $upperLine,
        public string $middleLine,
        public string $lowerLine,
    ) {
    }

    /** @param KeltnerChannelType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            upperLine: $data['upper_line'],
            middleLine: $data['middle_line'],
            lowerLine: $data['lower_line'],
        );
    }
}
