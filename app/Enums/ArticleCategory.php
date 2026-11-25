<?php

namespace App\Enums;

enum ArticleCategory: string
{
    case TransformationNumerique = 'transformation-numerique';
    case ActualitesTic = 'actualites-tic';
    case InnovationBilletterie = 'innovation-billetterie';
    case EvenementsTech = 'evenements-tech';
    case DeveloppementLocal = 'developpement-local';

    public function label(): string
    {
        return match ($this) {
            self::TransformationNumerique => 'Transformation numérique',
            self::ActualitesTic => 'Actualités TIC',
            self::InnovationBilletterie => 'Innovation en billetterie',
            self::EvenementsTech => "Événements tech en Côte d'Ivoire",
            self::DeveloppementLocal => 'Développement local',
        };
    }
}
