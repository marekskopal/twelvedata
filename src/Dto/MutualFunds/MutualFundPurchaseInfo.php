<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-import-type MutualFundExpensesType from MutualFundExpenses
 * @phpstan-import-type MutualFundMinimumsType from MutualFundMinimums
 * @phpstan-import-type MutualFundPricingType from MutualFundPricing
 * @phpstan-type MutualFundPurchaseInfoDataType array{
 *     expenses: MutualFundExpensesType,
 *     minimums: MutualFundMinimumsType,
 *     pricing: MutualFundPricingType,
 *     brokerages: list<string>,
 * }
 * @phpstan-type MutualFundPurchaseInfoType array{
 *     mutual_fund: array{purchase_info: MutualFundPurchaseInfoDataType},
 *     status: string,
 * }
 */
readonly class MutualFundPurchaseInfo
{
    /** @param list<string> $brokerages */
    public function __construct(
        public MutualFundExpenses $expenses,
        public MutualFundMinimums $minimums,
        public MutualFundPricing $pricing,
        public array $brokerages,
        public string $status,
    ) {
    }

    public static function fromJson(string $json): self
    {
        /** @var MutualFundPurchaseInfoType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param MutualFundPurchaseInfoType $data */
    public static function fromArray(array $data): self
    {
        $purchaseInfo = $data['mutual_fund']['purchase_info'];

        return new self(
            expenses: MutualFundExpenses::fromArray($purchaseInfo['expenses']),
            minimums: MutualFundMinimums::fromArray($purchaseInfo['minimums']),
            pricing: MutualFundPricing::fromArray($purchaseInfo['pricing']),
            brokerages: $purchaseInfo['brokerages'],
            status: $data['status'],
        );
    }
}
