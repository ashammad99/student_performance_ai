<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'teacher_id' => 1,
                'parent_id' => 1,
                'user_number' => 'STU1001',
                'name' => 'Omar Khaled',
                'email' => 'student1@example.com',
                'password' => Hash::make('password'),
                'age' => 14,
                'gender' => 'male',
                'grade' => '8',
            ],
            [
                'teacher_id' => 2,
                'parent_id' => 1,
                'user_number' => 'STU1002',
                'name' => 'Sara Khaled',
                'email' => 'student2@example.com',
                'password' => Hash::make('password'),
                'age' => 13,
                'gender' => 'female',
                'grade' => '7',
            ],
            [
                'teacher_id' => 1,
                'parent_id' => 2,
                'user_number' => 'STU1003',
                'name' => 'Yousef Ahmad',
                'email' => 'student3@example.com',
                'password' => Hash::make('password'),
                'age' => 15,
                'gender' => 'male',
                'grade' => '9',
            ],
            [
                'teacher_id' => 3,
                'parent_id' => 3,
                'user_number' => 'STU1004',
                'name' => 'Lina Mona',
                'email' => 'student4@example.com',
                'password' => Hash::make('password'),
                'age' => 12,
                'gender' => 'female',
                'grade' => '6',
            ],
            [
                'teacher_id' => 2,
                'parent_id' => 4,
                'user_number' => 'STU1005',
                'name' => 'Rania Salma',
                'email' => 'student5@example.com',
                'password' => Hash::make('password'),
                'age' => 13,
                'gender' => 'female',
                'grade' => '7',
            ],
            [
                'teacher_id' => 3,
                'parent_id' => 5,
                'user_number' => 'STU1006',
                'name' => 'Adam Adel',
                'email' => 'student6@example.com',
                'password' => Hash::make('password'),
                'age' => 14,
                'gender' => 'male',
                'grade' => '8',
            ],
        ];

        Student::insert($students);
    }
}
