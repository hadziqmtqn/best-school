<?php

namespace Database\Seeders\Auth;

use App\RolePermissions\PermissionGenerator;
use Illuminate\Database\Seeder;
use League\Csv\Exception;
use League\Csv\InvalidArgument;
use League\Csv\Reader;
use League\Csv\UnavailableStream;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     */
    public function run(): void
    {
        // Ambil seluruh permission dari generator
        $this->save(PermissionGenerator::generate());
        // Cluster

        /*$this->save(Reader::from(database_path('import/auth/cluster-permissions.csv'))
            ->setDelimiter(';')
            ->setHeaderOffset(0));*/
    }

    private function save($rows): void
    {
        $permissions = [];

        foreach ($rows as $row) {

            // Simpan / ambil permission
            $permission = Permission::firstOrCreate(['name' => $row['name']]);

            // Group permission ID berdasarkan role
            foreach ($row as $column => $value) {
                if ($column !== 'name' && strtoupper($value) === 'YES') {
                    $permissions[$column][] = $permission->id;
                }
            }
        }

        // Buat role jika belum ada
        foreach ($permissions as $name => $permissionIds) {
            Role::updateOrCreate(['name' => $name]);
        }

        // Ambil role dari DB
        $roles = Role::whereIn('name', array_keys($permissions))->get();

        // Attach permission ke role masing-masing
        foreach ($roles as $role) {
            $role->permissions()->syncWithoutDetaching($permissions[$role->name] ?? []);
        }
    }
}