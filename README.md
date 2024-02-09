# TwelveData API client library for PHP

Unofficial PHP API client library for the [TwelveData](https://twelvedata.com) API service. 


## Install

```sh
composer require marekskopal/twelvedata
```

## Usage

```php
use MarekSkopal\TwelveData\TwelveData;
use MarekSkopal\TwelveData\Enum\IntervalEnum;

// Create TwelveData instance
$twelveData = new TwelveData('<yourApiKey');

// Get the one minute time series for the AAPL symbol
$response = $twelveData->getCoreData()->timeSeries(
    symbol: 'AAPL',
    interval: => IntervalEnum::OneMinute,
);
```

## Covered endpoints
More endpoints will be covered in future versions.

### Reference Data

* Stocks List                    ✅
* Forex Pairs List               ✅
* Cryptocurrencies List          ✅
* ETF List                       ✅
* Indices List                   ✅
* Funds List                     ✅
* Bonds List                     ✅
* Exchanges                      ✅
* Cryptocurrency Exchanges       ✅
* Technical Indicators Interface ❌
* Symbol Search                  ✅
* Earliest Timestamp             ✅
* Market State                   ✅

### Core Data

* Time Series          ✅
* Exchange Rate        ✅
* Currency Conversion  ✅
* Quote                ✅
* Real-Time Price      ✅
* Edd of Day Price     ✅
* Market Movers        ❌

### Fundamentals

* Logo                  ❌
* Profile               ❌
* Dividends             ❌
* Splits                ❌
* Earnings              ❌
* Earnings Calendar     ❌
* IPO Calendar          ❌
* Statistics            ❌
* Insider Transactions  ❌
* Income Statement      ❌
* Balance Sheet         ❌
* Cash Flow             ❌
* Options Expiration    ❌
* Options Chain         ❌
* Key Executives        ❌
* Institutional Holders ❌
* Fund Holders          ❌
* Direct Holders        ❌
* Last changes          ❌

### WebSocket

* ❌

### Advanced

* Complex Data ❌
* Usage        ❌
