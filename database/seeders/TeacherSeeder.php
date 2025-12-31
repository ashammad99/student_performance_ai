<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            [
                'user_number' => 'TCH1001',
                'name' => 'Ahmed ali',
                'email' => 'teacher1@example.com',
                'password' => Hash::make('password'),
                'phone' => '0599100001',
                'specialization' => 'Mathematics',
                'hire_date' => '2020-09-01',
            ],
            [
                'user_number' => 'TCH1002',
                'name' => 'sami ali',
                'email' => 'teacher2@example.com',
                'password' => Hash::make('password'),
                'phone' => '0599100002',
                'specialization' => 'Science',
                'hire_date' => '2021-01-15',
            ],
            [
                'user_number' => 'TCH1003',
                'name' => 'ali ali',

                'email' => 'teacher3@example.com',
                'password' => Hash::make('password'),
                'phone' => '0599100003',
                'specialization' => 'Arabic',
                'hire_date' => '2019-03-20',
            ],
        ];

        Teacher::insert($teachers);

    }
}
