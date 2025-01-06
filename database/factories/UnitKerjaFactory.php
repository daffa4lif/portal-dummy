<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UnitKerja>
 */
class UnitKerjaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'role' => fake()->randomElement(['MAHASISWA', 'DOSEN', 'STAF KEPENDIDIKAN']),
            'fakultas' => 'FAKULTAS TEKNIK INDUSTRI',
            'prodi' => 'TEKNIK INFORMATIKA'
        ];
    }
}
