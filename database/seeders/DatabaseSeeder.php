<?php

namespace Database\Seeders;

use App\Models\ComfortCategory;
use App\Models\EmployeePosition;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@domain.uz',
            'password' => '12345678',
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@domain.uz',
            'password' => '12345678',

        ]);
        ComfortCategory::factory()->create([
            'name' => 'Executive',
        ]);
        ComfortCategory::factory()->create([
            'name' => 'Elite',
        ]);
        ComfortCategory::factory()->create([
            'name' => 'Prestige',
        ]);
        ComfortCategory::factory()->create([
            'name' => 'Sovereign',
        ]);
        ComfortCategory::factory()->create([
            'name' => 'Imperial',
        ]);
        EmployeePosition::factory()->create([
            'name' => 'Innovation Architect',
        ]);
        EmployeePosition::factory()->create([
            'name' => 'Client Success Strategist',
        ]);
        EmployeePosition::factory()->create([
            'name' => 'Digital Transformation Lead',
        ]);
        EmployeePosition::factory()->create([
            'name' => 'Operations Excellence Manager',
        ]);
        EmployeePosition::factory()->create([
            'name' => 'Brand Visionary',
        ]);

        $this->call(CarSeeder::class);
        $this->call(EmployeeSeeder::class);
    }
}
