<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Enum;

enum WebSocketActionEnum: string
{
    case Subscribe = 'subscribe';
    case Unsubscribe = 'unsubscribe';
    case Reset = 'reset';
}
