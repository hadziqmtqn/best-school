<?php

namespace Database\Seeders\Reference;

use App\Models\EducationalLevel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use League\Csv\Exception;
use League\Csv\InvalidArgument;
use League\Csv\Reader;
use League\Csv\UnavailableStream;

class EducationalLevelSeeder extends Seeder
{
    /**
     * @throws UnavailableStream
     * @throws InvalidArgument
     * @throws Exception
     */
    public function run(): void
    {
        $rows = Reader::from(database_path('import/references/educational-level.csv'))
            ->setDelimiter(';')
            ->setHeaderOffset(0);

        foreach ($rows as $row) {
            EducationalLevel::create([
                'slug' => Str::uuid()->toString(),
                'full_name' => $row['full_name'],
                'short_name' => $row['short_name']
            ]);
        }
    }
}
