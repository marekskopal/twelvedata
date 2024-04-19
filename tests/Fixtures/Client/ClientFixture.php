<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Fixtures\Client;

use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;

class ClientFixture
{
    public static function createDemo(): Client
    {
        return new Client(new Config(apiKey: 'demo'));
    }
}
