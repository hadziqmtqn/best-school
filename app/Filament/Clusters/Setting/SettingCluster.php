<?php

namespace App\Filament\Clusters\Setting;

use Filament\Clusters\Cluster;

class SettingCluster extends Cluster
{
    public static function canAccess(): bool
    {
        return false;
    }
}
