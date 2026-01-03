<?php

namespace App\Filament\Clusters\Post;

use Filament\Clusters\Cluster;

class PostCluster extends Cluster
{
    protected static bool $shouldRegisterNavigation = false;

    public static function canAccess(): bool
    {
        return false;
    }
}
