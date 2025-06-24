<?php

namespace Database\Seeders;

use App\Models\Difficulty;
use Illuminate\Database\Seeder;

class DifficultySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Difficulty::insert([
      [
        'name' => 'Mudah',
        "multiply" => 1,
        "duration" => 30,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Sulit',
        "multiply" => 2,
        "duration" => 30,
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
