<?php

namespace App\Enums;

enum ProjectType: string
{
    case LogicielMetier = 'logiciel-metier';
    case PlateformeWeb = 'plateforme-web';
    case ApplicationMobile = 'application-mobile';
    case SolutionBilletterie = 'solution-billetterie';
    case SystemeControleAcces = 'systeme-controle-acces';
    case IntegrationReseau = 'integration-reseau';

    public function label(): string
    {
        return match ($this) {
            self::LogicielMetier => 'Logiciel métier',
            self::PlateformeWeb => 'Plateforme web',
            self::ApplicationMobile => 'Application mobile',
            self::SolutionBilletterie => 'Solution de billetterie',
            self::SystemeControleAcces => "Système de contrôle d'accès",
            self::IntegrationReseau => 'Intégration réseau',
        };
    }

    /**
     * SVG path (Heroicons outline) displayed on project cards.
     */
    public function iconPath(): string
    {
        return match ($this) {
            self::LogicielMetier => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
            self::PlateformeWeb => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9',
            self::ApplicationMobile => 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z',
            self::SolutionBilletterie => 'M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z',
            self::SystemeControleAcces => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z',
            self::IntegrationReseau => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',
        };
    }
}
