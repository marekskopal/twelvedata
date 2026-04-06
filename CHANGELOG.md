# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/), and this project adheres to [Semantic Versioning](https://semver.org/).

## [1.0.0] - 2025-04-06

### Added
- Batch request support for executing multiple API calls in a single HTTP request
- WebSocket real-time price streaming with pluggable client interface
- Built-in adapter for phrity/websocket
- ETF endpoints (directory, full data, summary, performance, risk, composition, families, types)
- Mutual Fund endpoints (directory, full data, summary, performance, risk, ratings, composition, purchase info, sustainability, families, types)
- GitHub Actions CI pipeline

### Changed
- Improved README documentation with batch and WebSocket examples
- Enhanced composer.json metadata with keywords and support URLs

### Removed
- Removed deprecated API endpoints

## [0.9.8] - 2025-12-15

### Changed
- Refactored symbol guard to separate utility class
- Fixed datetime format handling
- Fixed method name and endpoint corrections
- Fixed typo in namespace

## [0.9.7] - 2025-11-01

### Added
- ShipMonk PHPStan rules for stricter static analysis

### Fixed
- Price target float type handling

## [0.9.6] - 2025-10-15

### Changed
- Changed type parameter to use enum for type safety

### Fixed
- Fixed adjust parameter handling
- Fixed null handling in DTOs

## [0.9.5] - 2025-10-01

### Fixed
- Fixed null handling in DTOs

## [0.9.4] - 2025-09-15

### Changed
- Removed unnecessary type castings

### Fixed
- Fixed typo

## [0.9.3] - 2025-09-01

### Fixed
- Fixed balance sheet liabilities null handling (contributed by @SanderHagen)

## [0.9.2] - 2025-08-15

### Fixed
- Fixed balance sheet assets null handling (contributed by @SanderHagen)

## [0.9.1] - 2025-08-01

### Fixed
- Fixed null handling

## [0.9.0] - 2025-07-15

### Added
- Technical indicators endpoints (100+ indicators across overlap, momentum, volume, volatility, cycle, price transform, and statistic categories)

## [0.8.0] - 2025-06-01

### Added
- Low-level API access via `TwelveData::get()` method for direct endpoint queries

## [0.7.0] - 2025-05-15

### Added
- Analysis endpoints (earnings estimate, revenue estimate, EPS trend, EPS revisions, growth estimates, recommendations, price target, analyst ratings snapshot, analyst ratings US equities)

## [0.6.0] - 2025-05-01

### Added
- Fundamentals: income statement consolidated, balance sheet consolidated, cash flow consolidated
- Fundamentals: IPO calendar, earnings calendar
- Fundamentals: market capitalization, last changes
- Date utilities for consistent date formatting

## [0.5.0] - 2025-04-15

### Added
- Regulatory endpoints (EDGAR filings, insider transactions, institutional holders, fund holders, direct holders)
- Fundamentals: key executives, press releases, statistics
- Fundamentals: splits, splits calendar, dividends calendar

## [0.4.0] - 2025-03-15

### Added
- Core data endpoints (time series, quote, latest price, end of day price, market movers)
- Reference data endpoints (stocks, forex pairs, crypto pairs, ETFs, funds, commodities, fixed income, indices, exchanges, market state, symbol search)
- Fundamentals: profile, logo, dividends, earnings, income statement, balance sheet, cash flow
- Currency endpoints (exchange rate, currency conversion)
- Typed exception hierarchy with factory pattern
- PSR-18 HTTP client auto-discovery
- Rate-limit retry logic
