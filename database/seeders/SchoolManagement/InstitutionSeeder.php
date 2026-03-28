<?php

namespace Database\Seeders\SchoolManagement;

use App\Models\EducationalLevel;
use App\Models\Institution;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class InstitutionSeeder extends Seeder
{
    /**
     * @throws FileNotFoundException
     */
    public function run(): void
    {
        $rows = json_decode(File::get(database_path('import/school-managements/institutions.json')), true);

        foreach ($rows as $row) {
            $name = $row['name'];

            Institution::create([
                'slug' => Str::slug($name),
                'educational_level_id' => EducationalLevel::where('short_name', $row['educational_level'])->first()?->id,
                'name' => $name,
                'npsn' => $row['npsn'],
                'email' => $row['email'],
                'phone_number' => $row['phone_number'],
                'province' => $row['province'],
                'city' => $row['city'],
                'district' => $row['district'],
                'village' => $row['village'],
                'street' => $row['street'],
                'postal_code' => $row['postal_code'],
                'status' => $row['status'],
                'profile' => $row['profile'],
                'school_establishment_decree' => $row['school_establishment_decree'],
                'date_establishment_decree' => $row['date_establishment_decree'],
                'operational_permit_decree' => $row['operational_permit_decree'],
                'date_operational_permit_decree' => $row['date_operational_permit_decree'],
            ]);
        }
    }
}
