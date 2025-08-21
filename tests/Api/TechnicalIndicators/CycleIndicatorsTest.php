<?php

declare(strict_types=1);

namespace Api\TechnicalIndicators;

use MarekSkopal\TwelveData\Api\TechnicalIndictors\CycleIndicators;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\CycleIndicators\HilbertTransformDominantCyclePeriod;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\CycleIndicators\HilbertTransformDominantCyclePhase;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\CycleIndicators\HilbertTransformPhasorComponents;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\CycleIndicators\HilbertTransformSineWave;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\CycleIndicators\HilbertTransformTrendVsCycleMode;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\Meta;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MetaIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\TechnicalIndicator;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CycleIndicators::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(DateUtils::class)]
#[UsesClass(QueryParamsUtils::class)]
#[UsesClass(TechnicalIndicator::class)]
#[UsesClass(Meta::class)]
#[UsesClass(MetaIndicator::class)]
#[UsesClass(HilbertTransformDominantCyclePeriod::class)]
#[UsesClass(HilbertTransformDominantCyclePhase::class)]
#[UsesClass(HilbertTransformPhasorComponents::class)]
#[UsesClass(HilbertTransformSineWave::class)]
#[UsesClass(HilbertTransformTrendVsCycleMode::class)]
final class CycleIndicatorsTest extends TestCase
{
    public function testHilbertTransformDominantCyclePeriod(): void
    {
        $cycleIndicators = new CycleIndicators(ClientFixture::createWithResponse('hilbert_transform_dominant_cycle_period.json'));

        self::assertInstanceOf(
            HilbertTransformDominantCyclePeriod::class,
            $cycleIndicators->hilbertTransformDominantCyclePeriod('AAPL')->values[0],
        );
    }

    public function testHilbertTransformDominantCyclePhase(): void
    {
        $cycleIndicators = new CycleIndicators(ClientFixture::createWithResponse('hilbert_transform_dominant_cycle_phase.json'));

        self::assertInstanceOf(
            HilbertTransformDominantCyclePhase::class,
            $cycleIndicators->hilbertTransformDominantCyclePhase('AAPL')->values[0],
        );
    }

    public function testHilbertTransformPhasorComponents(): void
    {
        $cycleIndicators = new CycleIndicators(ClientFixture::createWithResponse('hilbert_transform_phasor_components.json'));

        self::assertInstanceOf(
            HilbertTransformPhasorComponents::class,
            $cycleIndicators->hilbertTransformPhasorComponents('AAPL')->values[0],
        );
    }

    public function testHilbertTransformSineWave(): void
    {
        $cycleIndicators = new CycleIndicators(ClientFixture::createWithResponse('hilbert_transform_sine_wave.json'));

        self::assertInstanceOf(
            HilbertTransformSineWave::class,
            $cycleIndicators->hilbertTransformSineWave('AAPL')->values[0],
        );
    }

    public function testHilbertTransformTrendVsCycleMode(): void
    {
        $cycleIndicators = new CycleIndicators(ClientFixture::createWithResponse('hilbert_transform_trend_vs_cycle_mode.json'));

        self::assertInstanceOf(
            HilbertTransformTrendVsCycleMode::class,
            $cycleIndicators->hilbertTransformTrendVsCycleMode('AAPL')->values[0],
        );
    }
}
