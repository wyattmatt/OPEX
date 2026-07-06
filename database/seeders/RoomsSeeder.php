<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            ['code' => 'X101', 'name' => 'Basketball Court'],
            ['code' => 'UCM-PO001', 'name' => 'Area Parkir Outdoor'],
            ['code' => 'UCM-PB000', 'name' => 'Area Parkir Basement'],
            ['code' => 'UCM-MEP001', 'name' => 'Rumah Genset'],
            ['code' => 'UCM-LS001', 'name' => 'Lift Service'],
            ['code' => 'UCM-LP002', 'name' => 'Lift Passenger 2'],
            ['code' => 'UCM-LP001', 'name' => 'Lift Passenger 1'],
            ['code' => 'UCM-LA007', 'name' => 'Lobby Lift UCA-7'],
            ['code' => 'UCM-LA006', 'name' => 'Lobby Lift UCA-6'],
            ['code' => 'UCM-LA005', 'name' => 'Lobby Lift UCA-5'],
            ['code' => 'UCM-LA004', 'name' => 'Lobby Lift UCA-4'],
            ['code' => 'UCM-LA003', 'name' => 'Lobby Lift UCA-3'],
            ['code' => 'UCM-LA002', 'name' => 'Lobby Lift UCA-2'],
            ['code' => 'UCM-LA001', 'name' => 'Lobby Lift UCA-1'],
            ['code' => 'UCM-LA000', 'name' => 'Lobby Lift UCA-SB'],

            ['code' => 'UCM-KA007', 'name' => 'Koridor UCA-7'],
            ['code' => 'UCM-KA006', 'name' => 'Koridor UCA-6'],
            ['code' => 'UCM-KA005', 'name' => 'Koridor UCA-5'],
            ['code' => 'UCM-KA004', 'name' => 'Koridor UCA-4'],
            ['code' => 'UCM-KA003', 'name' => 'Koridor UCA-3'],
            ['code' => 'UCM-KA002', 'name' => 'Koridor UCA-2'],
            ['code' => 'UCM-KA001', 'name' => 'Koridor UCA-1'],
            ['code' => 'UCM-KA000', 'name' => 'Koridor UCA-SB'],

            ['code' => 'UCM-EU008', 'name' => 'Emergency Exit Utara UCA-8'],
            ['code' => 'UCM-EU007', 'name' => 'Emergency Exit Utara UCA-7'],
            ['code' => 'UCM-EU006', 'name' => 'Emergency Exit Utara UCA-6'],
            ['code' => 'UCM-EU005', 'name' => 'Emergency Exit Utara UCA-5'],
            ['code' => 'UCM-EU004', 'name' => 'Emergency Exit Utara UCA-4'],
            ['code' => 'UCM-EU003', 'name' => 'Emergency Exit Utara UCA-3'],
            ['code' => 'UCM-EU002', 'name' => 'Emergency Exit Utara UCA-2'],
            ['code' => 'UCM-EU001', 'name' => 'Emergency Exit Utara UCA-1'],

            ['code' => 'UCM-ES008', 'name' => 'Emergency Exit Selatan UCA-8'],
            ['code' => 'UCM-ES007', 'name' => 'Emergency Exit Selatan UCA-7'],
            ['code' => 'UCM-ES006', 'name' => 'Emergency Exit Selatan UCA-6'],
            ['code' => 'UCM-ES005', 'name' => 'Emergency Exit Selatan UCA-5'],
            ['code' => 'UCM-ES004', 'name' => 'Emergency Exit Selatan UCA-4'],
            ['code' => 'UCM-ES003', 'name' => 'Emergency Exit Selatan UCA-3'],
            ['code' => 'UCM-ES002', 'name' => 'Emergency Exit Selatan UCA-2'],
            ['code' => 'UCM-ES001', 'name' => 'Emergency Exit Selatan UCA-1'],

            ['code' => 'UCM-A408', 'name' => 'Student Lounge'],
            ['code' => 'UCM-A403', 'name' => 'Student Lounge'],
            ['code' => 'UCM-A204', 'name' => 'Secretary'],

            ['code' => 'A703', 'name' => 'Auditorium Control Room'],
            ['code' => 'A702', 'name' => 'Auditorium'],
            ['code' => 'A701', 'name' => 'Prefunction'],

            ['code' => 'A609', 'name' => 'Student Lounge'],
            ['code' => 'A608', 'name' => 'Meeting Room'],
            ['code' => 'A607', 'name' => 'Meeting Room'],
            ['code' => 'A606', 'name' => 'Studio'],
            ['code' => 'A605', 'name' => 'Studio'],
            ['code' => 'A604', 'name' => 'Studio'],
            ['code' => 'A603', 'name' => 'Studio'],
            ['code' => 'A602', 'name' => 'Lecturer Room VCD'],
            ['code' => 'A601', 'name' => 'Lecturer Room VCD'],

            ['code' => 'A511', 'name' => 'Student Lounge'],
            ['code' => 'A510', 'name' => 'Meeting Room'],
            ['code' => 'A509', 'name' => 'Meeting Room'],
            ['code' => 'A508', 'name' => 'Classroom'],
            ['code' => 'A507', 'name' => 'Classroom'],
            ['code' => 'A506', 'name' => 'Photography Laboratory'],
            ['code' => 'A505', 'name' => 'Classroom'],
            ['code' => 'A504', 'name' => 'Classroom'],
            ['code' => 'A503', 'name' => 'Classroom'],
            ['code' => 'A502', 'name' => 'Lecturer Room IMT'],
            ['code' => 'A501', 'name' => 'Lecturer Room IMT'],

            ['code' => 'A410', 'name' => 'Lecturer Room'],
            ['code' => 'A401', 'name' => 'Classroom'],

            ['code' => 'A311', 'name' => 'Classroom'],
            ['code' => 'A310', 'name' => 'Classroom'],
            ['code' => 'A308', 'name' => 'Stock Exchange'],
            ['code' => 'A307', 'name' => 'Classroom'],
            ['code' => 'A306', 'name' => 'Classroom'],
            ['code' => 'A305', 'name' => 'Classroom'],
            ['code' => 'A304', 'name' => 'Classroom'],
            ['code' => 'A303', 'name' => 'Computer Laboratory 2'],
            ['code' => 'A302', 'name' => 'Computer Laboratory'],
            ['code' => 'A301', 'name' => 'Information and Communication Technology (ICT)'],
            ['code' => 'A300', 'name' => 'Storage'],

            ['code' => 'A206', 'name' => 'Librarian Room'],
            ['code' => 'A205', 'name' => 'Library'],
            ['code' => 'A204C', 'name' => 'Meeting Room'],
            ['code' => 'A204B', 'name' => 'Meeting Room'],
            ['code' => 'A204A', 'name' => 'Communication Media Center (CMC)'],
            ['code' => 'A203', 'name' => 'Rectorate'],
            ['code' => 'A202', 'name' => 'Meeting Room'],
            ['code' => 'A201', 'name' => 'University Office'],

            ['code' => 'A106', 'name' => 'Business Simulation Room'],
            ['code' => 'A105', 'name' => 'Marketing and Admission (MNA)'],
            ['code' => 'A104', 'name' => 'Cafe'],
            ['code' => 'A103', 'name' => 'Culinary Storage'],
            ['code' => 'A102', 'name' => 'Culinary Laboratory'],
            ['code' => 'A101', 'name' => 'Student Lounge'],
            ['code' => 'A001', 'name' => 'Cafetaria'],
        ];

        foreach ($rooms as $room) {
            DB::table('rooms')->insert([
                'id' => Str::uuid(),
                'code' => $room['code'],
                'name' => $room['name'],
                'created_at' => now(),
                'created_by' => null,
                'updated_at' => now(),
                'modified_by' => null,
            ]);
        }
    }
}
