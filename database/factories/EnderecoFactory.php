<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pais' => $this->faker->country(),
            'estado' => $this->faker->state(),
            'cidade' => $this->faker->city(),
            'bairro' => $this->faker->stateAbbr(),
            'logradouro' => $this->faker->streetAddress(),
            'numero' => $this->faker->buildingNumber(),
            'cep' => $this->faker->randomNumber(8),
            'descricao' => $this->faker->text(50)
        ];
    }
}
