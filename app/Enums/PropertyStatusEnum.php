<?php

namespace App\Enums;

enum PropertyStatusEnum :string{
    case SOLD = 'Sold Out';
    case SALE = 'On Sale';
    case HOLD = 'on Hold';
}
