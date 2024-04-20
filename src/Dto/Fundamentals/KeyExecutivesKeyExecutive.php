<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class KeyExecutivesKeyExecutive
{
    public function __construct(public string $name, public string $title, public int $age, public int $yearBorn, public ?int $pay)
    {
    }

    /**
     * @param array{
     *     name: string,
     *     title: string,
     *     age: int,
     *     year_born: int,
     *     pay: int|null,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(name: $data['name'], title: $data['title'], age: $data['age'], yearBorn: $data['year_born'], pay: $data['pay']);
    }
}
