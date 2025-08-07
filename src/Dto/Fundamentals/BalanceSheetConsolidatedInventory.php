<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type BalanceSheetConsolidatedInventoryType array{
 *     total_inventory: int,
 *     inventories_adjustments_allowances?: int,
 *     other_inventories?: int,
 *     finished_goods?: int,
 *     work_in_process?: int,
 *     raw_materials?: int,
 * }
 */
readonly class BalanceSheetConsolidatedInventory
{
    public function __construct(
        public int $totalInventory,
        public ?int $inventoriesAdjustmentsAllowances,
        public ?int $otherInventories,
        public ?int $finishedGoods,
        public ?int $workInProcess,
        public ?int $rawMaterials,
    ) {
    }

    /** @param BalanceSheetConsolidatedInventoryType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            totalInventory: $data['total_inventory'],
            inventoriesAdjustmentsAllowances: $data['inventories_adjustments_allowances'] ?? null,
            otherInventories: $data['other_inventories'] ?? null,
            finishedGoods: $data['finished_goods'] ?? null,
            workInProcess: $data['work_in_process'] ?? null,
            rawMaterials: $data['raw_materials'] ?? null,
        );
    }
}
