<?php

namespace App\Filament\Clusters\Event;

use Filament\Clusters\Cluster;

class EventCluster extends Cluster
{
    public static function canAccess(): bool
    {
        return false;
    }
}
