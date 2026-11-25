<?php

namespace App\Enums;

enum ContractType: string
{
    case Cdi = 'cdi';
    case Cdd = 'cdd';
    case Stage = 'stage';
    case Freelance = 'freelance';
    case Consultant = 'consultant';

    public function label(): string
    {
        return match ($this) {
            self::Cdi => 'CDI',
            self::Cdd => 'CDD',
            self::Stage => 'Stage',
            self::Freelance => 'Freelance',
            self::Consultant => 'Consultant',
        };
    }
}
