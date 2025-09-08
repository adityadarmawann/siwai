<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    public function run(): void
    {
        $jabatan = [
            ['jabatan' => 'Kepala Dinas'],
            ['jabatan' => 'Sekretaris'],
            ['jabatan' => 'Kepala Bidang'],
            ['jabatan' => 'Kepala Seksi'],
            ['jabatan' => 'Staff'],
        ];

        foreach ($jabatan as $data) {
            Jabatan::create($data);
        }
    }
}