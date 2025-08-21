<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type IchimokuCloudType array{
 *     datetime: string,
 *     tenkan_sen?: string,
 *     kijun_sen?: string,
 *     senkou_span_a: string,
 *     senkou_span_b: string,
 *     chikou_span?: string,
 * }
 * @implements ValueInterface<IchimokuCloud, IchimokuCloudType>
 */
readonly class IchimokuCloud implements ValueInterface
{
    public function __construct(
        public DateTimeImmutable $datetime,
        public ?string $tenkanSen,
        public ?string $kijunSen,
        public string $senkouSpanA,
        public string $senkouSpanB,
        public ?string $chikouSpan,
    ) {
    }

    /** @param IchimokuCloudType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            tenkanSen: $data['tenkan_sen'] ?? null,
            kijunSen: $data['kijun_sen'] ?? null,
            senkouSpanA: $data['senkou_span_a'],
            senkouSpanB: $data['senkou_span_b'],
            chikouSpan: $data['chikou_span'] ?? null,
        );
    }
}
