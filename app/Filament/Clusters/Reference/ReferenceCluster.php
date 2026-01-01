<?php

namespace App\Filament\Clusters\Reference;

use Filament\Clusters\Cluster;

class ReferenceCluster extends Cluster
{
    public static function canAccess(): bool
    {
        return false;
    }
}
