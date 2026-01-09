<?php

namespace App\Filament\Clusters\Setting\Resources\Admins\Pages;

use App\Filament\Clusters\Setting\Resources\Admins\AdminResource;
use App\Helpers\CanAccess;
use App\Models\User;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Model;

class ListAdmins extends ListRecords
{
    protected static string $resource = AdminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth('md')
                ->visible(CanAccess::to('CreateAdmin'))
                ->using(function (array $data, string $model): Model {
                    // case: user sudah ada → hanya assign role
                    if (($data['level'] ?? null) !== 'high_level') {
                        $user = User::findOrFail($data['user_id']);

                        if (! empty($data['roles'])) {
                            $user->syncRoles($data['roles']);
                        }

                        return $user; // wajib return Model
                    }

                    // case: high_level → create user baru (default behaviour)
                    return $model::create(
                        collect($data)->except(['roles', 'user_id'])->toArray()
                    );
                })
        ];
    }
}
