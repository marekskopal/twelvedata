<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class Logo
{
    public function __construct(public ?string $url, public ?string $logoBase, public ?string $logoQuote,)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     url?: string,
         *     logo_base?: string,
         *     logo_quote?: string,
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     url?: string,
     *     logo_base?: string,
     *     logo_quote?: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(url: $data['url'] ?? null, logoBase: $data['logo_base'] ?? null, logoQuote: $data['logo_quote'] ?? null);
    }
}
