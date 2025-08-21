<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api\ReferenceData;

use MarekSkopal\TwelveData\Api\ReferenceData\SupportingMetadata;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\ReferenceData\Countries;
use MarekSkopal\TwelveData\Dto\ReferenceData\CountriesData;
use MarekSkopal\TwelveData\Dto\ReferenceData\InstrumentType;
use MarekSkopal\TwelveData\Dto\ReferenceData\TechnicalIndicators;
use MarekSkopal\TwelveData\Dto\ReferenceData\TechnicalIndicatorsOutputValue;
use MarekSkopal\TwelveData\Dto\ReferenceData\TechnicalIndicatorsParameter;
use MarekSkopal\TwelveData\Dto\ReferenceData\TechnicalIndicatorsTechnicalIndicator;
use MarekSkopal\TwelveData\Dto\ReferenceData\TechnicalIndicatorsTinting;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\DateUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SupportingMetadata::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(DateUtils::class)]
#[UsesClass(Countries::class)]
#[UsesClass(CountriesData::class)]
#[UsesClass(InstrumentType::class)]
#[UsesClass(TechnicalIndicators::class)]
#[UsesClass(TechnicalIndicatorsOutputValue::class)]
#[UsesClass(TechnicalIndicatorsParameter::class)]
#[UsesClass(TechnicalIndicatorsTechnicalIndicator::class)]
#[UsesClass(TechnicalIndicatorsTinting::class)]
final class SupportingMetadataTest extends TestCase
{
    public function testCounties(): void
    {
        $referenceData = new SupportingMetadata(ClientFixture::createWithResponse('countries.json'));

        self::assertInstanceOf(
            Countries::class,
            $referenceData->countries(),
        );
    }

    public function testInstrumentType(): void
    {
        $referenceData = new SupportingMetadata(ClientFixture::createWithResponse('instrument_type.json'));

        self::assertInstanceOf(
            InstrumentType::class,
            $referenceData->instrumentType(),
        );
    }

    public function testTechnicalIndicators(): void
    {
        $referenceData = new SupportingMetadata(ClientFixture::createWithResponse('technical_indicators.json'));

        self::assertInstanceOf(
            TechnicalIndicators::class,
            $referenceData->technicalIndicators(),
        );
    }
}
