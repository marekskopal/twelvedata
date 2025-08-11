# Twelve Data API client library for PHP

Unofficial PHP API client library for the [Twelve Data](https://twelvedata.com) API service. 


## Install

```sh
composer require marekskopal/twelvedata
```

## Usage

```php
use MarekSkopal\TwelveData\TwelveData;
use MarekSkopal\TwelveData\Enum\IntervalEnum;

// Create TwelveData instance
$twelveData = new TwelveData('<yourApiKey>');

// Get the one minute time series for the AAPL symbol
$response = $twelveData->coreData->timeSeries(
    symbol: 'AAPL',
    interval: IntervalEnum::OneMinute,
);
```

## Covered endpoints
More endpoints will be covered in future versions.

### Core Data

* Time Series          ✅
* Time Series Cross    ✅
* Quote                ✅
* Latest Price         ✅
* Edd of Day Price     ✅
* Market Movers        ✅

### Reference Data
#### Asset Catalogs
* Stocks                         ✅
* Forex Pairs                    ✅
* Cryptocurrency Pairs           ✅
* ETFs                           ✅
* Funds                          ✅
* Commodities                    ✅
* Fixed Income                   ✅
* Indices List                   ✅
#### Discovery
* Symbol Search                  ✅
* Cross listings                 ✅
* Earliest Timestamp             ✅
#### Markets
* Exchanges                      ✅
* Exchange schedule              ✅
* Cryptocurrency Exchanges       ✅
* Market State                   ✅
#### Supporting Metadata
* Instrument Type                ✅
* Countries                      ✅
* Technical Indicators           ❌

### Fundamentals

* Logo                          ✅
* Profile                       ✅
* Dividends                     ✅
* Dividends Calendar            ✅
* Splits                        ✅
* Splits Calendar               ✅
* Earnings                      ✅
* Earnings Calendar             ✅
* IPO Calendar                  ✅
* Statistics                    ✅
* Income Statement              ✅
* Income Statement Consolidated ✅
* Balance Sheet                 ✅
* Balance Sheet Consolidated    ✅
* Cash Flow                     ✅
* Cash Flow Consolidated        ✅
* Key Executives                ✅
* Options Expiration            ✅
* Options Chain                 ✅
* Market Capitalization         ✅
* Last changes                  ✅

### Currencies

* Exchange Rate        ✅
* Currency Conversion  ✅

### ETFs ❌

### Mutual Funds ❌

### Technical Indicators
#### Overlap studies
* Bollinger bands                           ✅
* High demand                               ✅
* Double exponential moving average         ✅
* Exponential moving average                ✅
* High demand                               ✅
* Hilbert transform instantaneous trendline ✅
* Ichimoku cloud                            ✅
* Kaufman adaptive moving average           ✅
* Keltner channel                           ✅
* Moving average                            ✅
* MESA adaptive moving average              ✅
* McGinley dynamic indicator                ✅
* Midpoint                                  ✅
* Midprice                                  ✅
* Pivot points high low                     ✅
* Parabolic stop and reverse                ✅
* Parabolic stop and reverse extended       ✅
* Simple moving average                     ✅
* High demand                               ✅
* Triple exponential moving average T3MA    ✅
* Triple exponential moving average TEMA    ✅
* Triangular moving average                 ✅
* Volume weighted average price             ✅
* Weighted moving average                   ✅
#### Momentum indicators ❌
#### Volume indicators ❌
#### Volatility indicators ❌
#### Price transform ❌
#### Cycle indicators ❌
#### Statistic functions ❌

### Analysis
* Earnings Estimate           ✅
* Revenue Estimate            ✅
* EPS Trend                   ✅
* EPS Revisions               ✅
* Growth Estimates            ✅
* Recommendations             ✅
* Price Target                ✅
* Analyst Ratings Snapshot    ✅
* Analyst Ratings US Equities ✅

### Regulatory

* EDGAR Fillings        ✅
* Insider Transactions  ✅
* Institutional Holders ✅
* Fund Holders          ✅
* Direct Holders        ✅
* Tax Information       ✅
* Sanctioned Entities   ✅

### Advanced

* Complex Data ❌
* Usage        ✅

### WebSocket ❌

## Notice
This is NOT an official Twelve Data library, and the authors of this library are not affiliated with Twelve Data in any way, shape or form. Twelve Data APIs and data are Copyright © 2025 Twelve Data Pte. Ltd.

## Contributing
If you want to contribute, feel free to submit a pull request.
