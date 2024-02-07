<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Fixtures\Client;

use MarekSkopal\TwelveData\Client\Client;

class ClientFixture
{
    public static function createDemo(): Client
    {
        return new Client('demo');
    }
}
