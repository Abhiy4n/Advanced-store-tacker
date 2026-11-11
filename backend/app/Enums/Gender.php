<?php

namespace App\Enums;

enum Gender: string
{
    case Men = 'men';
    case Women = 'women';
    case Kids = 'kids';
    case Unisex = 'unisex';

    public function label(): string
    {
        return match ($this) {
            self::Men => 'Men',
            self::Women => 'Women',
            self::Kids => 'Kids',
            self::Unisex => 'Unisex',
        };
    }
}
