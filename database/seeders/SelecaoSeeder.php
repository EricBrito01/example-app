<?php

namespace Database\Seeders;

use App\Models\Selecao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SelecaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Selecao::factory()->count(40)->create();
    }
}
