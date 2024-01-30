<?php

namespace App\Enums;

enum PropertyTypeEnum :string{
    case OPEN = 'Open Property';
    case SELL = 'Sell Property';
    case EXCLUSIVE = 'Exclusive Property';
    case NET = 'Net Property';
}
