<?php

namespace App\Enums;

enum ListingTypeEnum: string {
    case ALL = 'all';
    case OWN = 'own';
    case EXTERNAL = 'external';
    case CAMPAIGNS = 'campaigns';
}
