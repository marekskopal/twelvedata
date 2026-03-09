# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Commands

```bash
# Install dependencies
composer install

# Run all tests
vendor/bin/phpunit

# Run a single test file
vendor/bin/phpunit tests/Api/CoreDataTest.php

# Run a single test method
vendor/bin/phpunit --filter testTimeSeries tests/Api/CoreDataTest.php

# Static analysis
vendor/bin/phpstan analyse

# Code style check
vendor/bin/phpcs src/ tests/

# Code style auto-fix
vendor/bin/phpcbf src/ tests/
```

## Architecture

This is a PHP 8.3+ library providing a typed client for the [Twelve Data](https://twelvedata.com) financial market data API.

### Entry Point

`TwelveData` (`src/TwelveData.php`) is the main facade. It instantiates a `Client` and exposes domain-specific API groups as public properties:

- `$coreData` — time series, quotes, market movers, end-of-day prices
- `$referenceData` — asset catalogs, exchanges, markets, discovery
- `$fundamentals` — financial statements, dividends, earnings, institutional holdings
- `$currencies` — exchange rates, currency conversion
- `$technicalIndicators` — 100+ indicators (momentum, overlap, volatility, volume, cycle, price transform, statistic)
- `$analysis` — earnings estimates, analyst ratings, price targets
- `$regulatory` — SEC filings, insider transactions
- `$advanced` — API usage tracking

### HTTP Layer

`Client` (`src/Client/`) uses PSR-18 auto-discovery (`php-http/discovery`) so any PSR-18 compatible HTTP client works. The API key is sent via `Authorization: apikey <key>` header. Rate-limit retry logic is configurable via `Config::$tooManyRequestsRepeat` and `$tooManyRequestsWaitTime`.

### DTOs

Each API response maps to readonly DTOs in `src/Dto/`, organized by the same domain groups. DTOs use named constructor patterns (typically `fromJson()`).

### Enums

All typed parameters (intervals, asset types, market movers, etc.) use PHP 8.1+ backed enums in `src/Enum/`.

### Exceptions

`src/Exception/ApiException` factory dispatches to typed subclasses based on the API error code.

## Testing

Tests use `ClientFixture` which loads fixture JSON files from `tests/Fixtures/Response/` instead of making real HTTP calls. Every test class must declare `#[CoversClass]` and `#[UsesClass]` attributes — PHPUnit is configured with `requireCoverageMetadata="true"` and `beStrictAboutCoverageMetadata="true"`, so missing attributes will fail the test run.

## Code Style

- `declare(strict_types=1)` in every file
- Classes are `readonly` wherever possible
- PHPStan is configured at `level: max` with `bleedingEdge` rules and ShipMonk strict rules; suppress only with inline `@phpstan-ignore` with specific identifiers (never blanket ignores)
- Namespace root: `MarekSkopal\TwelveData\`
