<?php

namespace Database\Factories;

use App\Models\Candidato;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Selecao>
 */
class SelecaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word(),
            'fk_clienteId' => Cliente::pluck('id')->random(),
            'fk_candidatoId'=> Candidato::pluck('id')->random(),
        ];
    }
}
