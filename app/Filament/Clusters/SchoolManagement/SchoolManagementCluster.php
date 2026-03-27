<?php

namespace App\Filament\Clusters\SchoolManagement;

use Filament\Clusters\Cluster;

class SchoolManagementCluster extends Cluster
{
    protected static bool $shouldRegisterNavigation = false;

    public static function canAccess(): bool
    {
        return false;
    }
}
