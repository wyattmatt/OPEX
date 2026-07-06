<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            [
                'id' => Str::uuid(),
                'code' => 'HD',
                'name' => 'HDMI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'code' => 'DG',
                'name' => 'Dongle',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
