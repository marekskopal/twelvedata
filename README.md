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

### Mutual Funds ❌

### ETFs ❌

### Fundamentals

* Logo                  ✅
* Profile               ✅
* Dividends             ✅
* Splits                ✅
* Earnings              ✅
* Earnings Calendar     ❌
* IPO Calendar          ❌
* Statistics            ✅
* Income Statement      ✅
* Balance Sheet         ✅
* Cash Flow             ✅
* Options Expiration    ✅
* Options Chain         ✅
* Key Executives        ✅
* Last changes          ❌

### Currencies

* Exchange Rate        ✅
* Currency Conversion  ✅

### Analysis
* Earnings Estimate             ❌
* Revenue Estimate              ❌
* EPS Trend                     ❌
* EPS Revisions                 ❌
* Growth Estimates              ❌
* Recommendations               ❌
* Price Target                  ❌
* Analyst Ratings - Light       ❌
* Analyst Ratings - US Equities ❌

### Regulatory

* EDGAR Fillings        ✅
* Insider Transactions  ✅
* Institutional Holders ✅
* Fund Holders          ✅
* Direct Holders        ✅
* Tax Information       ✅
* Sanctioned Entities   ✅

### WebSocket ❌

### Advanced

* Complex Data ❌
* Usage        ✅

### Technical Indicators ❌

## Notice
This is NOT an official Twelve Data library, and the authors of this library are not affiliated with Twelve Data in any way, shape or form. Twelve Data APIs and data are Copyright © 2024 Twelve Data Pte. Ltd.

## Contributing
If you want to contribute, feel free to submit a pull request.
