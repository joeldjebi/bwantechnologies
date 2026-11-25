<?php

namespace App\Enums;

enum Department: string
{
    case Developpement = 'developpement';
    case Commercial = 'commercial';
    case Reseau = 'reseau';
    case Support = 'support';
    case Management = 'management';

    public function label(): string
    {
        return match ($this) {
            self::Developpement => 'Développement',
            self::Commercial => 'Commercial',
            self::Reseau => 'Réseau & Télécoms',
            self::Support => 'Support technique',
            self::Management => 'Management',
        };
    }
}
