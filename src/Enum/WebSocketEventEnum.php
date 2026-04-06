<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Enum;

enum WebSocketEventEnum: string
{
    case Price = 'price';
    case SubscribeStatus = 'subscribe-status';
    case UnsubscribeStatus = 'unsubscribe-status';
    case Heartbeat = 'heartbeat';
}
