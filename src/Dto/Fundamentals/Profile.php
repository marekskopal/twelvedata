<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class Profile
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $exchange,
        public string $micCode,
        public string $sector,
        public string $industry,
        public int $employees,
        public string $website,
        public string $description,
        public string $type,
        public string $ceo,
        public string $address,
        public string $address2,
        public string $city,
        public string $zip,
        public string $state,
        public string $country,
        public string $phone,
    ) {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     symbol: string,
         *     name: string,
         *     exchange: string,
         *     mic_code: string,
         *     sector: string,
         *     industry: string,
         *     employees: int,
         *     website: string,
         *     description: string,
         *     type: string,
         *     CEO: string,
         *     address: string,
         *     address2: string,
         *     city: string,
         *     zip: string,
         *     state: string,
         *     country: string,
         *     phone: string,
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     symbol: string,
     *     name: string,
     *     exchange: string,
     *     mic_code: string,
     *     sector: string,
     *     industry: string,
     *     employees: int,
     *     website: string,
     *     description: string,
     *     type: string,
     *     CEO: string,
     *     address: string,
     *     address2: string,
     *     city: string,
     *     zip: string,
     *     state: string,
     *     country: string,
     *     phone: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            name: $data['name'],
            exchange: $data['exchange'],
            micCode: $data['mic_code'],
            sector: $data['sector'],
            industry: $data['industry'],
            employees: $data['employees'],
            website: $data['website'],
            description: $data['description'],
            type: $data['type'],
            ceo: $data['CEO'],
            address: $data['address'],
            address2: $data['address2'],
            city: $data['city'],
            zip: $data['zip'],
            state: $data['state'],
            country: $data['country'],
            phone: $data['phone'],
        );
    }
}
