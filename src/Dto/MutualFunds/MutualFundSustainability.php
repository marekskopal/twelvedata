<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-import-type MutualFundEsgPillarsType from MutualFundEsgPillars
 * @phpstan-type MutualFundSustainabilityDataType array{
 *     score: int|null,
 *     corporate_esg_pillars: MutualFundEsgPillarsType,
 *     sustainable_investment: bool,
 *     corporate_aum: float|null,
 * }
 * @phpstan-type MutualFundSustainabilityType array{
 *     mutual_fund: array{sustainability: MutualFundSustainabilityDataType},
 *     status: string,
 * }
 */
readonly class MutualFundSustainability
{
    public function __construct(
        public ?int $score,
        public MutualFundEsgPillars $corporateEsgPillars,
        public bool $sustainableInvestment,
        public ?float $corporateAum,
        public string $status,
    ) {
    }

    public static function fromJson(string $json): self
    {
        /** @var MutualFundSustainabilityType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param MutualFundSustainabilityType $data */
    public static function fromArray(array $data): self
    {
        $sustainability = $data['mutual_fund']['sustainability'];

        return new self(
            score: $sustainability['score'] ?? null,
            corporateEsgPillars: MutualFundEsgPillars::fromArray($sustainability['corporate_esg_pillars']),
            sustainableInvestment: $sustainability['sustainable_investment'],
            corporateAum: $sustainability['corporate_aum'] ?? null,
            status: $data['status'],
        );
    }
}
