<?php

namespace App\Repositories\SchoolManagements;

use App\Helpers\UserRole;
use App\Models\Institution;
use Illuminate\Database\Eloquent\Builder;

class InstitutionRepository
{
    public static function options(): array
    {
        $user = auth()->user()->loadMissing('homebaseActive');

        return Institution::query()
            ->when(!UserRole::isSuperAdmin(), function (Builder $query) use ($user) {
                $query->where('id', $user?->homebaseActive?->institution_id);
            })
            ->get()
            ->mapWithKeys(fn(Institution $institution) => [$institution->id => $institution->name])
            ->toArray();
    }
}
