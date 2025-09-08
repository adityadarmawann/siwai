<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skpd;

class SkpdSeeder extends Seeder
{
    public function run(): void
    {
        $skpd = [
            ['skpd' => 'Dinas Komunikasi dan Informatika'],
            ['skpd' => 'Dinas Pendidikan'],
            ['skpd' => 'Dinas Kesehatan'],
            ['skpd' => 'Dinas Pekerjaan Umum'],
        ];

        foreach ($skpd as $data) {
            Skpd::create($data);
        }
    }
}