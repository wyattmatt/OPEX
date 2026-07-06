<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status')->insert([
            [
                'id' => Str::uuid(),
                'code' => 'AVL',
                'name' => 'Available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'code' => 'USE',
                'name' => 'In Use',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'code' => 'RPR',
                'name' => 'Repair',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'code' => 'BRK',
                'name' => 'Broken',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
