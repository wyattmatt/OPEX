<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = DB::table('roles')->where('code', 'SU')->first();
        $department = DB::table('departments')->where('code', 'ICT')->first();

        DB::table('users')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'SuperAdmin',
                'email' => 'superadmin@ciputra.ac.id',
                'password' => Hash::make('superadmin'),
                'role' => $role->id,
                'department' => $department->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
