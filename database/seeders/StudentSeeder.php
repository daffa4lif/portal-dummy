<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 3; $i++) {
            for ($j = 1; $j <= 100; $j++) {
                \App\Models\User::factory()->has(\App\Models\UserProfile::factory(), 'profile')
                    ->create([
                        'username' => "2{$i}00018" . sprintf('%03d', $j)
                    ]);
            }
        }
    }
}
