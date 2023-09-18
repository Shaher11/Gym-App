<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'Admin'
        ]);

        User::factory()->create([
            'name' => 'Instructor',
            'email' => 'instructor@example.com',
            'role' => 'Instructor'
        ]);

        User::factory()->create([
            'name' => 'Ahmed',
            'email' => 'ahmed@example.com'
        ]);

        User::factory()->create([
            'name' => 'Khaled',
            'email' => 'khaled@example.com'
        ]);

        User::factory()->count(10)->create();

        User::factory()->count(10)->create([
            'role' => 'Instructor'
        ]);
    }
}
