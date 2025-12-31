<?php

namespace Database\Seeders;

use App\Models\Parnet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parents = [
            [
                'user_number' => 'PAR1001',
                'name' => 'Khaled Nasser',
                'email' => 'parent1@example.com',
                'password' => Hash::make('password'),
                'phone' => '0599200001',
                'relation' => 'father',
            ],
            [
                'user_number' => 'PAR1002',
                'name' => 'Ahmad Youssef',
                'email' => 'parent2@example.com',
                'password' => Hash::make('password'),
                'phone' => '0599200002',
                'relation' => 'father',
            ],
            [
                'user_number' => 'PAR1003',
                'name' => 'Mona Ali',
                'email' => 'parent3@example.com',
                'password' => Hash::make('password'),
                'phone' => '0599200003',
                'relation' => 'mother',
            ],
            [
                'user_number' => 'PAR1004',
                'name' => 'Salma Ibrahim',
                'email' => 'parent4@example.com',
                'password' => Hash::make('password'),
                'phone' => '0599200004',
                'relation' => 'mother',
            ],
            [
                'user_number' => 'PAR1005',
                'name' => 'Adel Hassan',
                'email' => 'parent5@example.com',
                'password' => Hash::make('password'),
                'phone' => '0599200005',
                'relation' => 'father',
            ],
        ];

        Parnet::insert($parents);

    }
}
