<?php

namespace App\Filament\Clusters\SchoolManagement\Resources\Employees\Actions;

use App\Helpers\UserRole;
use App\Models\EmployeePosition;
use App\Models\Homebase;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\HtmlString;

class EditAccountStatus
{
    public static function action(): Action
    {
        return Action::make('edit_account_status')
            ->label('Ubah Status Akun')
            ->modalHeading('Ubah Status Akun')
            ->modalDescription(function (User $user): string|HtmlString {
                $desc = '<span>Apakah anda yakin akan ' . ($user->is_active ? 'menonaktifkan' : 'mengaktifkan') . ' akun pegawai ini?</span>';

                if ($user->is_active) {
                    $desc .= '<br/><br/><span>Menonaktifkan akun akan menonaktifkan seluruh unit kerja dan jabatan pegawai</span>';
                }

                return new HtmlString($desc);
            })
            ->color(fn(User $user): string => $user->is_active ? 'info' : 'danger')
            ->requiresConfirmation()
            ->action(function (User $user): void {
                $isActive = !$user->is_active;

                $user->is_active = $isActive;
                $user->save();

                if (!$isActive) {
                    Homebase::where('user_id', $user->id)
                        ->update(['is_active' => false]);

                    EmployeePosition::where('user_id', $user->id)
                        ->update(['is_active' => false]);
                }

                Notification::make()
                    ->success()
                    ->title('Status akun berhasil diubah')
                    ->send();
            })
            ->visible(UserRole::isSuperAdmin());
    }
}